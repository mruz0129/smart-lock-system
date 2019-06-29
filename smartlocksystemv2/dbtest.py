import pymysql
import sys
import datetime

# open a database connection
# be sure to change the host IP address, username, password and database name to match your own
conn = pymysql.connect (host = "169.254.251.231", user = "testingacc", passwd = "admin123", db = "sqldb")

a = conn.cursor()
a.execute("select staff_rfid from staff where staff_rfid='252,35,119,12,164'")
test = a.fetchone()
print(test[0])

print(test)
