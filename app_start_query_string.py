from flask import Flask, request
import RPi.GPIO as GPIO
app = Flask(__name__)
LED = 4
GPIO.setmode(GPIO.BCM)
GPIO.setup(LED, GPIO.OUT, initial=GPIO.LOW)

@app.route("/")
def helloworld():
    return "Hello World"

@app.route("/led")
def led():
    state = request.args.get("state", "error") # 웹브라우저에서 URL 내의 쿼리스트링을 통해 웹서버로 전달되는 내용 확인
    if state == "on":
        GPIO.output(LED, GPIO.HIGH)
        return "LED ON"
    elif state == "off":
        GPIO.output(LED, GPIO.LOW)
    elif state == "error":
        return "Query string 'state' is not sent"
    else:
        return "Wrong query string is not sent"
    return "LED " + state


@app.route("/gpio/cleanup")
def gpio_cleanup():
    GPIO.cleanup()
    return "GPIO CLEANUP"

if __name__ == "__main__":
    app.run(host="0.0.0.0")
