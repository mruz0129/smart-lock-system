import RPi.GPIO as GPIO
import time
import signal
import threading

channel = 7

# GPIO setup
GPIO.setmode(GPIO.BOARD)
GPIO.setup(channel, GPIO.OUT)

def door_on(pin):
    GPIO.output(pin, GPIO.HIGH) # Turn On

def door_off(pin):
    GPIO.output(pin, GPIO.LOW) # Turn Off
    
if __name__ == '__main__':
    try:
        door_off(channel)
        time.sleep(10)
        
        door_on(channel)
        time.sleep(5)
        
        door_off(channel)
        time.sleep(10)
        
        GPIO.cleanup()
        
    except KeyboardInterrupt:
        GPIO.cleanup()
