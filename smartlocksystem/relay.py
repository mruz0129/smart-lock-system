import RPi.GPIO as GPIO
import time
import signal

channel = 16

# GPIO setup
GPIO.setmode(GPIO.BOARD)
GPIO.setup(channel, GPIO.OUT)

def door_on(pin):
    GPIO.output(pin, GPIO.HIGH) # Turn On

def door_off(pin):
    GPIO.output(pin, GPIO.LOW) # Turn Off
    
if __name__ == '__main__':
    try:
        door_on(channel)
        time.sleep(1)
        door_off(channel)
        #time.sleep(1)
        GPIO.cleanup()
    except KeyboardInterrupt:
        GPIO.cleanup()
