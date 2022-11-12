#-*-coging:utf-8-*-
#필요한 모듈을 읽어옴

import RPi.GPIO as GPIO
import time

#사용할 GPIO 핀 번호 설정(BCM 모드)
led_pin = 4         #GPIO 4

#불필요한 warning 제거
GPIO.setwarnings(False)

#GPIO 핀 번호 모드 설정
GPIO.setmode(GPIO.BCM)

#LED 핀을 출력으로 설정
GPIO.setup(led_pin, GPIO.OUT)

#10번 반복문
for i in range(10):
    GPIO.output(led_pin, 1) #LED 켜짐
    time.sleep(1)           #1초동안 대기상태
    GPIO.output(led_pin, 0) #LED 꺼짐
    time,sleep(1)           #1초동안 대기상태

GPIO.cleanup()              #GPIO 설정 초기화
