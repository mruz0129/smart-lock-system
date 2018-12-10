import pymysql
import sys
import datetime

# open a database connection
# be sure to change the host IP address, username, password and database name to match your own
connection = pymysql.connect (host = "localhost", user = "root", passwd = "admin123", db = "smartlockdb")

# prepare a cursor object using cursor() method
cursor = connection.cursor()

# execute the SQL query using execute() method.
cursor.execute ("select unit_start_time from unit")

# fetch all of the rows from the query
data = cursor.fetchone()

# print the rows
test = data[0]
test = test.strftime("%H:%M:%S")
print(test)

now = datetime.datetime.now()
now = now.replace(hour=15, minute=0, second= 0)
now = now.strftime("%H:%M:%S")

if now > test:
    print("true")
else:
    print("false")

# close the cursor object
cursor.close ()

# close the connection
connection.close ()

def __init__(self):
    self.tk = tk.Tk()
    self.tk.title("Smart Lock System")
    self.frame = tk.Frame(self.tk)
    self.frame.grid()
    self.tk.columnconfigure(0, weight=1)
    self.tk.attributes('-zoomed', True)
    self.tk.attributes('-fullscreen', True)
    self.state = True
    self.tk.bind("<F11>", self.toggle_fullscreen)
    self.tk.bind("<Escape>", self.end_fullscreen)
    self.tk.config(cursor="none")
    
    self.show_idle()
		
    t = Thread(target=self.listen_rfid)
    t.daemon = True
    t.start()
    
def show_idle(self):
    self.welcomeLabel = ttk.Label(self.tk, text="Please Present\nYour Token")
    self.welcomeLabel.config(font='size, 20', justify='center', anchor='center')
    self.welcomeLabel.grid(sticky=tk.W+tk.E, pady=210)
