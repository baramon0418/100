#-*-coding:utf-8-*-
# 필요한 라이브러리를 불러옴
import RPi.GPIO as GPIO
import time
# 노란색 LED, 빨간색 LED, PIR 센서의 GPIO 핀 번호 설정
led_R = 20
led_Y = 21
sensor = 4
# 불필요한 warning 제거, GPIO핀의 번호 모드 설정
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
# LED의 GPIO 핀(led_R, led_Y)을 출력으로 설정하고 PIR 센서의 GPIO 핀(sensor)을 입력으로 설정
GPIO.setup(led_R, GPIO.OUT)
GPIO.setup(led_Y, GPIO.OUT)
GPIO.setup(sensor, GPIO.IN)
print("PIR Ready ....")
time.sleep(5) # PIR 센서 준비 시간

try:
    while True:
        # PIR 센서는 사람의 움직임을 감지한 경우 3.3V(high 신호,1)을 출력하므로 PIR 센서의 GPIO 핀(sensor)은 3.3V(high 신호,1)을 입력받음
        if GPIO.input(sensor) == 1: 
            GPIO.output(led_Y, 1) # 노란색 LED 켬
            GPIO.output(led_R, 0) # 빨간색 LED 끔
            print("Motion Detected !")
            time.sleep(0.2)
# PIR 센서는 사람의 움직임을 감지하지 못한 경우 0V(low 신호,0)을 출력하므로 PIR 센서의 GPIO 핀(sensor)은 0V(low 신호,0)을 입력받음
        if GPIO.input(sensor) == 0:
            GPIO.output(led_R, 1) # 빨간색 LED 켬
            GPIO.output(led_Y, 0) # 노란색 LED 끔
            print("Motion Not Detected !")
            time.sleep(0.2)
except KeyboardInterrupt:
    print("Stopped by User")
    GPIO.cleanup()
