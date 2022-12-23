from urllib.parse import urlencode, unquote
from flask import Flask, request
from flask import render_template
import requests
import json
import time, datetime
import paho.mqtt.client as mqtt
from flask import Flask, render_template, request
mqttc = mqtt.Client()


app = Flask(__name__)
message = 'NodeMCU LED on'
led = {'name': 'NodeMCU LED pin', 'state': 'ON'}

@app.route("/")
def home():
    return render_template("index.html")

def chhour(crntdate, minute_delta):    
    date = datetime.datetime.strptime(crntdate, '%Y%m%d%H%M')
    dt = datetime.timedelta(minutes=minute_delta)
    date = date + dt
    nd = date.strftime('%Y%m%d')
    nt = date.strftime('%H%M')

    return nd, nt
    
def get_kmaobs(base_date, base_time):
    url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getUltraSrtNcst'
    params ={'serviceKey' : '5iqHpLcB9F+AaXMW7Jxi4pnJ5MOsxKASAaQz4AOZgaK5Qrv8VchAZCj8hj+QjeOMSYx3MbRS8Hd2/QnZgwMytw==', 'pageNo' : '1', 'numOfRows' : '10', 'dataType' : 'JSON', 'base_date' : base_date, 'base_time' : base_time, 'nx' : '55', 'ny' : '127' }
    response = requests.get(url, params=params) 
    
    return response
    
def get_forecast(obs):
    minute_delta = 1
    base_date = datetime.datetime.today().strftime("%Y%m%d")
    base_time = datetime.datetime.today().strftime("%H%M")
    
    r_item = {}
    d_cnt = 0
    
    while True:
        response = get_kmaobs(base_date, base_time)
        d_cnt += 1
        
        r_dict = json.loads(response.text)  
        #r_resultcode = r_dict.get("response").get("header").get('resultCode')
        r_resultcode = r_dict["response"]["header"]['resultCode']

        if r_resultcode == '00':
            #r_item = r_dict.get("response").get("body").get("items").get("item")
            r_item = r_dict["response"]["body"]["items"]["item"]

            for item in r_item:
                if(item["category"] == obs):
                    result = item                               # observation data
                    result["result"]= "ok"
                    return result            
        else:
            if d_cnt == 7200:
                result = {"result": "fail"}                     # no observation data
                return result
            else:
                base_date, base_time = chhour(base_date + base_time, -minute_delta)


@app.route('/')
def main():
    mqttc.publish('inTopic', '1') # MQTT client가 토픽 “inTopic”에 “1’”메시지를 게시함 =>
# NodeMCU(MQTT client)는 구독하는 토픽 “inTopic”으로 온 메시지 “1”을 확인하여 LED ON
    templateData={'message': message, 'led': led}
    return render_template('index.html', **templateData)

@app.route("/get/temp")
def get_temp():
    try:
        obsdata = get_forecast("T1H")
        mqttc.publish('inTopic', '1') 
    except:                                                     # error
        obsdata = {"result": "error"}
    
        

    return json.dumps(obsdata)                                  # json.dumps 함수는 JSON 객체(예, {'a':1,'b':2})를 JSON 객체의 문자열(예, "{'a':1,'b':2}")로 변환

@app.route("/get/wspd")
def get_wspd():
    try:
        obsdata = get_forecast("WSD") 
    except:
        obsdata = {"result": "error"}

    return json.dumps(obsdata)                                  # json.dumps 함수는 JSON 객체(예, {'a':1,'b':2})를 JSON 객체의 문자열(예, "{'a':1,'b':2}")로 변환

@app.route("/get/rehd")
def get_rehd():
    try:
        obsdata = get_forecast("REH") 
    except:
        obsdata = {"result": "error"}

    return json.dumps(obsdata)    
            
if __name__ == "__main__":
    app.run(host="0.0.0.0")
    mqttc.loop_start() # MQTT client 실행
    app.run(host='0.0.0.0', debug=False) 
