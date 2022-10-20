#-*-coding:utf-8-*-
#필요한 모듈을 읽어옴
import RPi.GPIO as GPIO
import time

#사용할 GPIO 핀 번호 설정
button_pin = 15     #GPIO 15

#불필요한 warning 제거
GPIO.setwarnings(False)


#GPIO 핀 번호 모드 설정
GPIO.setmode(GPIO.BCM)

#button_pin(GPIO 15)을 입력으로 설정하고 pull-down 설정
GPIO.setup(button_pin, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)

#polling 방
while 1:    #무한루프
    #만약 button_pin(GPIO 15)에 3.3V(GPIO.HIGH,1)가 입력되면 "button pushed!"를 화면에 출력함
    if GPIO.input(button_pin) == GPIO.HIGH:
        print("Button pushed!")
    time,sleep(0.1) #0.1초 기다림
