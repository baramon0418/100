#-*-coding:utf-8-*-
import paho.mqtt.client as mqtt # Paho-MQTT 패키지 불러오기
from flask import Flask, render_template, request # Flask 패키지 불러오기
mqttc = mqtt.Client() # MQTT client 객체 생성
app = Flask(__name__) # Flask 웹서버 객체 생성
message = 'NodeMCU LED on'
led = {'name': 'NodeMCU LED pin', 'state': 'ON'}
# Flask 웹서버의 URL 주소로 접근하면 아래의 main() 함수를 실행
@app.route('/')
def main():
    mqttc.publish('inTopic', '1') # MQTT client가 토픽 “inTopic”에 “1’”메시지를 게시함 =>
# NodeMCU(MQTT client)는 구독하는 토픽 “inTopic”으로 온 메시지 “1”을 확인하여 LED ON
    templateData={'message': message, 'led': led}
    return render_template('main.html', **templateData)

# Flask 웹서버의 URL 주소 끝에 '/LED/<action>'를 붙여서 접근하면 action 값에 따른 action() 함수를 실행
@app.route('/LED/<action>')
def action(action):
    if action == 'on':
        mqttc.publish('inTopic', '1')
        led['state'] = 'ON'
        message = 'NodeMCU LED on'
    if action == 'off':
        mqttc.publish('inTopic', '0') 
        led['state'] = 'OFF'
        message = 'NodeMCU LED off'
    templateData={'message': message, 'led': led}
    return render_template('main.html', **templateData)
if __name__ == "__main__":
    mqttc.connect('localhost', 1883, 60) 
    mqttc.loop_start() # MQTT client 실행
    app.run(host='0.0.0.0', debug=False) # Flask 웹서버 실행
