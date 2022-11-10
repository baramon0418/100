#-*-coding:utf-8-*-
import RPi.GPIO as GPIO
import time


GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)


TRIG = 23
ECHO = 24
led_R = 20
led_G = 21

print("Distance measurement in process")


GPIO.setup(TRIG, GPIO.OUT)
GPIO.setup(ECHO, GPIO.IN)
GPIO.setup(led_R, GPIO.OUT)
GPIO.setup(led_G, GPIO.OUT)


GPIO.output(TRIG, False)
print("Waiting for sensor to settle")
time.sleep(2)

p1 = GPIO.PWM(led_R, 50)       
p2 = GPIO.PWM(led_G, 50)        
p1.start(0)
p2.start(0)                   

    
    
    

try:
    while True:
        GPIO.output(TRIG, True)     
        time.sleep(0.00001)         
        GPIO.output(TRIG, False)    

        while GPIO.input(ECHO) == False:    
            start = time.time()             
        while GPIO.input(ECHO) == True:     
            stop = time.time()

        check_time = stop - start          
        distance = check_time * 34300 / 2   
        print("Distance : %.lf cm" %(distance))
        time.sleep(0.4)
        
        light_on = False
        if distance < 30:             
            p1.ChangeDutyCycle(50)
            time.sleep(0.5)
            p1.ChangeDutyCycle(0)   
        else:                              
            p1.ChangeDutyCycle(0)
        light_on = not light_on

        light_on = False
        if distance >= 30:             
            p2.ChangeDutyCycle(50)
            time.sleep(0.5)
            p2.ChangeDutyCycle(0)
        else:                              
            p2.ChangeDutyCycle(0)
        light_on = not light_on

except KeyboardInterrupt:
    print("Mwasurement stopped by user")
    p1.stop()
    p2.stop()
    GPIO.cleanup()
