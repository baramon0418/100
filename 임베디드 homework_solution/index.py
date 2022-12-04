from urllib.parse import urlencode, unquote
from flask import Flask, request
from flask import render_template
import requests
import json
import time, datetime

app = Flask(__name__)

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
    params ={'serviceKey' : 'DBbxKUDjM9DmJ02j387cMw72prjqtuZ7HKUOyYw+YribvhKzCPgz/ME8haN6A1JQBYasuv3ayYmeL6DJvWYvVg==', 'pageNo' : '1', 'numOfRows' : '10', 'dataType' : 'JSON', 'base_date' : base_date, 'base_time' : base_time, 'nx' : '55', 'ny' : '127' }
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
                  
@app.route("/get/temp")
def get_temp():
    try:
        obsdata = get_forecast("T1H") 
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
            
if __name__ == "__main__":
    app.run(host="0.0.0.0")
