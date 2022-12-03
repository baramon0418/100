# -*- encoding: utf-8 -*-
import requests
import json
from pprint import pprint
from flask import Flask, request
from flask import render_template
app = Flask(__name__)
from datetime import datetime
import time

datet = int(time.strftime('%Y%m%d'))
timet = int(time.strftime('%H%M'))
url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getUltraSrtNcst'
params ={'serviceKey' : '5iqHpLcB9F+AaXMW7Jxi4pnJ5MOsxKASAaQz4AOZgaK5Qrv8VchAZCj8hj+QjeOMSYx3MbRS8Hd2/QnZgwMytw==', 'pageNo' : '1', 'numOfRows' : '10', 'dataType' : 'JSON', 'base_date' : datet, 'base_time' : timet, 'nx' : '69', 'ny' : '129' }
response = requests.get(url,params=params)                         

if (response.status_code >= 200) or (response.status_code < 300):   
    r_dict = json.loads(response.text)   

    pprint(r_dict)                      

    r_resultcode = r_dict["response"]["header"]['resultCode']
    r_item = r_dict["response"]["body"]["items"]["item"]




@app.route("/")
def home():
    return render_template("index.html") 

@app.route("/Temperature")
def Temperature():
    try:
        if r_resultcode == '00':
            for item in r_item:
                if(item.get("category") == "T1H"):  
                    result = item
                    break
        return result
    except expression as identifier:
        return "fail"
        
@app.route("/WindSpeed")
def WindSpeed():
    try:
        if r_resultcode == '00':
            for item in r_item:
                if(item.get("category") == "WSD"):  
                    result = item
                    break
        return result
    except expression as identifier:
        return "fail"

if __name__ == "__main__":
    app.run(host="0.0.0.0")
