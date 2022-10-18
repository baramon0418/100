#-*-coding:utf-8-*-
# 필요한 라이브러리를 불러옵니다.
import RPi.GPIO as GPIO
import time

#사용할 GPIO 핀 번호 설정
led_pin = 18

#불필요한 warning 제거, GPIO 핀 번호 모드 설정
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

#GPIO 18번 핀을 출력으로 설정
GPIO.setup(led_pin, GPIO.OUT)

#PWM 인스턴스 p를 만들고 GPIO 18번을 PWM 핀으로 설정하고 주파수 50Hz으로 설정
p = GPIO.PWM(led_pin, 50)

#duty cycle을 0으로 설정하여 PWM 시작
p.start(0)

try:
    while 1:
        for dc in range(0,101,5):   #dc의 값은 0에서 100까지 5만큼 증가
            p.ChangeDutyCycle(dc)   #dc의 값으로 duty cycle 변경
            time.sleep(0.1)         #0.1초 딜레이
        for dc in range(100,-1,-5): #dc의 값은 100에서 0까지 5만큼 감소
            p.ChangeDutyCycle(dc)   #dc의 값으로 duty cycle 변경
            time.sleep(0.1)         #0.1초 딜레이
except KeyboardInterrupt:           #키보드 컨트롤C 눌렀을 때 예외발생
    pass                            #무한반복을 빠져나와 아래의 코드를 실행

p.stop()                            #PWM 종료
GPIO.cleanup()                      #GPIO 설정을 초기화
