import RPi.GPIO as GPIO
import time

button_pin = 15
led_pin = 4

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

GPIO.setup(button_pin, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)

GPIO.setup(led_pin, GPIO.OUT)


p = GPIO.PWM(led_pin, 100) 


light_on = False

def button_callback(channel):
    global light_on 

    if light_on == False:
        while 1:
            GPIO.output(led_pin, 1) 
            time.sleep(0.5)
            GPIO.output(led_pin, 0) 
            time.sleep(0.5)

            if GPIO.input(button_pin) == True:
                break
            
      
    else:
        GPIO.output(led_pin, 0) 
    light_on = not light_on 

GPIO.add_event_detect(button_pin, GPIO.RISING, callback=button_callback, bouncetime=300)

while 1:
    time.sleep(0.1)
    
GPIO.cleanup()
