import sys
import time
import datetime
import RPi.GPIO as GPIO
import MFRC522
import signal
import pymysql
import tkinter
from tkinter import *

#connection to database
conn = pymysql.connect(host='localhost',user='root',password='admin123',db='smartlockdb')
a = conn.cursor()
root = Tk()


GPIO.setwarnings(False)

continue_reading = True

#Variables
global my_uid, guicunitcode, guicunit, guicstarttime, guicendtime

root.title("Smart Lock System")
root.geometry("600x370")
root.resizable(0,0)
guicunitcode = StringVar()
guicunit = StringVar()
guicstarttime = StringVar()
guicendtime = StringVar()
guimessage = StringVar()

guimessage.set("")
#my_uid = None

def get_unit():
    global newunit, starttime, endtime, cstarttime, cendtime
    selectunitsql=("select unit_id from unit where unit_day="+"'"+cday+"' and start_time<="+"'"+ctime+"' and end_time>="+"'"+ctime+"' and unit_start_date<="+"'"+cdate+"' and unit_end_date>="+"'"+cdate+"'")
    a.execute(selectunitsql)
    unit = a.fetchone()
    if unit is None:
        newunit = None
        guicunitcode.set('No Ongoing Class')
        guicunit.set('No Ongoing Class')
        guicstarttime.set('00:00:00')
        guicendtime.set('00:00:00')
    else:    
        newunit = unit[0]
        a.execute("select unit_name from unit where unit_id=%s", newunit)
        unitname = a.fetchone()
        unitname = unitname[0]
        a.execute("select start_time from unit where unit_id=%s", newunit)
        start = a.fetchone()
        starttime = start[0]
        cstarttime = str(starttime)
        #starttime = starttime.strftime("%H:%M:%S")
        a.execute("select end_time from unit where unit_id=%s", newunit)
        end = a.fetchone()
        endtime = end[0]
        cendtime = str(endtime)
        #endtime = endtime.strftime("%H:%M:%S")
        
        #Set the values get to GUI
        guicunitcode.set(newunit)
        guicunit.set(unitname)
        guicstarttime.set("START: "+cstarttime)
        guicendtime.set("END: "+cendtime)

def get_time():
    global now, day, month, ctime, cday, cdate
    now = datetime.datetime.now()
    cday =  now.strftime("%a")
    ctime = now.strftime("%H:%M:%S")
    cdate = now.strftime("%Y-%m-%d")
    day = now.strftime("%d")
    month = now.strftime("%m")
    
#Method for force shutdown the system
def end_read(signal, frame):
    global continue_reading
    print ("Ctrl+C captured, ending read.")
    continue_reading = False

# Method for opening door
def open_door(channel):
   GPIO.setup(channel, GPIO.OUT)
   print("Access Granted")
   GPIO.output(channel, GPIO.HIGH)
   print("You may enter the room now!")
   #print("Attendance taken on" + ctime)
   time.sleep(5)
   GPIO.output(channel, GPIO.LOW)
   GPIO.cleanup(channel)
   GPIO.setmode(GPIO.BOARD)

# Hook the SIGINT
signal.signal(signal.SIGINT, end_read)

# Create an object of the class MFRC522
MIFAREReader = MFRC522.MFRC522()

# Welcome message
print ("Welcome to Smart Lock System")
print ("Please Scan your Student ID")
#print ("Press Ctrl-C to stop.")

#get time and unit when system started
get_time()
get_unit()

img = PhotoImage(file="img/swin_logo.png")

def GUI():
    #GUI for the system
    label_1 = Label(root, text="Current Class")
    iconlabel = Label(root, image=img)

    unitcodelabel = Label(root, textvariable = guicunitcode)
    unitlabel = Label(root, textvariable = guicunit)
    startlabel = Label(root, textvariable = guicstarttime)
    tolabel = Label(root, text="to ")
    endlabel = Label(root, textvariable = guicendtime)
    messagelabel = Label(root, textvariable = guimessage)

    label_1.grid(row=0, column=3, sticky="nsew", padx=35)
    #label_2.grid(row=1, sticky=E)
    #label_3.grid(row=2, sticky=E)
    #label_4.grid(row=3, sticky=E)
    iconlabel.grid(row=0, column=0, columnspan=2, rowspan=7, sticky="nsew", padx=5, pady=5)

    unitcodelabel.grid(row=1, column=3, columnspan=6, sticky="nsew")
    unitlabel.grid(row=2, column=3, sticky="nsew")
    startlabel.grid(row=3, column=3, sticky="nsew")
    tolabel.grid(row=4, column=3, sticky="nsew")
    endlabel.grid(row=5, column=3, sticky="nsew")
    messagelabel.grid(row=6, column=3, sticky="nsew")
    
GUI()

#root.mainloop()

while continue_reading:
   
   root.update_idletasks()
   root.update()
   if continue_reading == False:
       root.quit()
   
   # Get current time
   time.ctime()
   currenttime = time.strftime('%l:%M%p on %b %d, %Y')
   current = now.strftime("%Y-%m-%d %H:%M:%S")
   get_time()
   
   # get current unit
   get_unit()
   
   channel = 16 #GPIO pin number for relay switch
    
   # Scan for cards    
   (status,TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)

   # If a card is found
   if status == MIFAREReader.MI_OK:
      print("Card detected")
   
   # Get the UID of the card
   (status,uid) = MIFAREReader.MFRC522_Anticoll()

   # If we have the UID, continue
   if status == MIFAREReader.MI_OK:
      # Print UID
      # print("Card read UID: %s,%s,%s,%s,%s"  % (uid[0], uid[1], uid[2], uid[3],uid[4]))
      newuid = "%s,%s,%s,%s,%s"  % (uid[0], uid[1], uid[2], uid[3],uid[4])
      print (newuid)
      # This is the default key for authentication
      key = [0xFF,0xFF,0xFF,0xFF,0xFF,0xFF]

      # Select the scanned tag
      MIFAREReader.MFRC522_SelectTag(uid)
      
      a.execute("select staff_rfid from staff where staff_rfid=%s", newuid)
      staffuid = a.fetchone()
      if staffuid is None:
          a.execute("select lecturer_rfid from lecturer where lecturer_rfid=%s", newuid)
          lectureruid = a.fetchone()
          if lectureruid is None:
              if newunit is None:
                  print("There is no class ongoing currently.")
                  print("Access Denied")
                  guimessage.set("There is no class ongoing currently")
                  root.update()
                  time.sleep(2)
                  guimessage.set("")
                  root.update()
              else:
                  a.execute("select student_rfid from "+newunit+" where student_rfid=%s", newuid)
                  data = a.fetchone()
                  if data is None:
                      print("ID do not exist")
                      guimessage.set("ID doesn't exist")
                      root.update()
                      time.sleep(2)
                      guimessage.set("")
                      root.update()
                      my_uid = None
                  else:
                      my_uid = data[0]
                      a.execute("select `"+day+"/"+month+"` from "+newunit+" where student_rfid=%s", newuid)
                      checkatt = a.fetchone()
                      if checkatt is None:
                          check = None
                      else:    
                          check = checkatt[0]

                      if (ctime < cendtime):
                        #If uid of card matches, relay will be on
                            if newuid == my_uid:
                                 if (check == 0):
                                     a.execute("update "+newunit+" set `"+day+"/"+month+"`=1 where student_rfid=%s",newuid)
                                     a.execute("INSERT INTO `accesslog`(`access_rfid`, `access_time`) VALUES ('"+newuid+"','"+current+"')")
                                     conn.commit()
                                     guimessage.set("Attendance taken on " + currenttime)
                                     root.update()
                                     open_door(channel)
                                     print("Attendance taken on" + currenttime)
                                     guimessage.set("")
                                     root.update()
                                 else:
                                     guimessage.set("Your Attedance is already taken! Please proceed with the class.")
                                     root.update()
                                     open_door(channel)
                                     guimessage.set("")
                                     root.update()
                            else:
                            #If card id not found in database
                                print("Access Denied!")
                      else:
                            print("You are not in this class") 
          else:    
              lectureruid = lectureruid[0]
              if lectureruid == newuid:
                  a.execute("INSERT INTO `accesslog`(`access_rfid`, `access_time`) VALUES ('"+newuid+"','"+current+"')")
                  conn.commit()
                  guimessage.set("Access granted")
                  root.update()
                  open_door(channel)
                  guimessage.set("")
                  root.update()
      else:
          staffuid = staffuid[0]
          if staffuid == newuid:
              a.execute("INSERT INTO `accesslog`(`access_rfid`, `access_time`) VALUES ('"+newuid+"','"+current+"')")
              conn.commit()
              guimessage.set("Access granted")
              root.update()
              open_door(channel)
              guimessage.set("")
              root.update()
            



            
  
    


