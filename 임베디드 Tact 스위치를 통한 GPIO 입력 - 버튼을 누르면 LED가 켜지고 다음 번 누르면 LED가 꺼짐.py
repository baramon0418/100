#-*-coding:utf-8-*-
# 필요한 모듈을 읽어옴
import RPi.GPIO as GPIO
import time
# 사용할 GPIO 핀 번호 설정
button_pin = 15
led_pin = 4
# 다음 페이지에서 계속됨

# 불필요한 warning 제거
GPIO.setwarnings(False)
# GPIO 핀 번호 모드 설정
GPIO.setmode(GPIO.BCM)
# button_pin(GPIO 15)을 입력으로 설정하고 pull-down 설정
GPIO.setup(button_pin, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
# led_pin(GPIO 4)을 출력으로 설정
GPIO.setup(led_pin, GPIO.OUT)
# boolean 변수 설정
light_on = False
# button_callback 함수를 정의
def button_callback(channel):
    global light_on # 함수 내에서 변수 light_on를 수정하기 위해 global 변수로 선언
    if light_on == False: # LED가 꺼져 있을 때
        GPIO.output(led_pin, 1) # LED 켬
        print("LED ON!")
    else: # LED가 켜져 있을 때
        GPIO.output(led_pin, 0) # LED 끔
        print("LED OFF!")
    light_on = not light_on # False <=> True swapping
# Event handling 방식으로 GPIO 15(button_pin) 핀에 들어오는 입력이 0에서 1로 변하는 rising event를
# 감지하면 button_callback 함수를 실행함. 300ms bounce time을 설정하여 잘못된 신호를 방지함
GPIO.add_event_detect(button_pin, GPIO.RISING, callback=button_callback, bouncetime=300)
while 1: # 무한루프 (프로그램을 종료시키지 않고 event가 발생하면 button_callback 함수를 실행함) 
    time.sleep(0.1) # 0.1초 기다림
GPIO.cleanup()
