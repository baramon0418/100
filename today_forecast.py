# -*- encoding: utf-8 -*-
import requests
import json
from pprint import pprint

url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getUltraSrtNcst'
params ={'serviceKey' : 'DBbxKUDjM9DmJ02j387cMw72prjqtuZ7HKUOyYw+YribvhKzCPgz/ME8haN6A1JQBYasuv3ayYmeL6DJvWYvVg==', 'pageNo' : '1', 'numOfRows' : '10', 'dataType' : 'JSON', 'base_date' : '20221115', 'base_time' : '0600', 'nx' : '55', 'ny' : '127' }
response = requests.get(url, params=params)                         # GET 방식으로 원하는 데이터를 웹 서버에 요청하여 respons를 받음

if (response.status_code >= 200) or (response.status_code < 300):   # HTTP request가 성공한 경우
    r_dict = json.loads(response.text)    # json.loads 함수는 JSON 객체의 문자열(예, "{'a':1,'b':2}")을 JSON 객체(예, {'a':1,'b':2})로 변환
                                          # json.dumps 함수는 JSON 객체(예, {'a':1,'b':2})를 JSON 객체의 문자열(예, "{'a':1,'b':2}")로 변환
    #print(r_dict)                        # for debugging, print of json data
    pprint(r_dict)                        # for debugging, pretty print of json data

    r_resultcode = r_dict["response"]["header"]['resultCode']
    r_item = r_dict["response"]["body"]["items"]["item"]

    if r_resultcode == '00':
        for item in r_item:
            if(item.get("category") == "T1H"):   # 기온(T1H)
                result = item
                break

print(result)
print("===================================================")
print("Forecast date (YYMMDD): " + result['baseDate'])
print("Forecast time (hhmm): " + result['baseTime'])
print("Temperature (C): " + str(result['obsrValue']))
print("===================================================")
