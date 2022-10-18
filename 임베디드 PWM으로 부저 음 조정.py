#-*-coding:utf-8-*-
# 필요한 라이브러리를 불러옴
import RPi.GPIO as GPIO
import time

#사용할 GPIO 핀 번호 설정
bz_pin = 18

#불필요한 warning 제거, GPIO핀의 번호 모드 설정
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

#GPIO 18번 핀을 출력으로 설정
GPIO.setup(bz_pin, GPIO.OUT)

#PWM 인스턴스 p를 만들고 GPIO 18번 PWM 핀으로 설정하고 주파수는 100Hz으로 설정
p=GPIO.PWM(bz_pin, 100)

#4옥타브 도~시 5옥타브 도의 주파수
Frq = [262, 294, 330, 349, 392, 440, 493, 523]
speed = 0.5         #음과 음 사이의 연주시간 설정 0.5초

p.start(10)
#duty cycle을 10으로 설정하여 PWM 시작

try:
    while 1:
        for fr in Frq:
            p.ChangeFrequency(fr)   #주파수 변경
            time.sleep(speed)       #speed 초 만큼 딜레이 0.5초
except KeyboardInterrupt:           #키보드 컨트롤C 눌렀을 때 예외발생
    pass                            #무한반복을 빠져나와 아래의 코드를 실행

p.stop()                            #PWM 종료
GPIO.cleanup()                      #GPIO 설정 초기화 
