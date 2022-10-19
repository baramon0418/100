#-*-coding:utf-8-*-
# 필요한 라이브러리를 불러옴
import RPi.GPIO as GPIO
import time

#서보모터를 PWM으로 제어할 GPIO 핀 번호 설정
SERVO_PIN = 18

#불필요한 warning 제거, GPIO핀의 번호 모드 설정
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

#GPIO 18번 핀을 출력으로 설정
GPIO.setup(SERVO_PIN, GPIO.OUT)

#PWM 인스턴스 서보를 만들고 GPIO 18번을 PWM 핀으로 설정하고 주파수는 50Hz으로 설정
servo = GPIO.PWM(SERVO_PIN, 50)
#duty cycle을 0으로 설정하여 PWM 시작
servo.start(0)

try:
    while True:
        #duty cycle를 변경하여 서보모터를 원하는 만큼 움직임
        servo.ChangeDutyCycle(7.5)  #90도
        time.sleep(1)
        servo.ChangeDutyCycle(12.5) #180도
        time.sleep(1)
        servo.ChangeDutyCycle(2.5)  #0도
        time.sleep(1)

except KeyboardInterrupt:
    servo.stop()
    GPIO.cleanup()
