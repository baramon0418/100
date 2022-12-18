# -*- encoding: utf-8 -*-
import requests
import json
from pprint import pprint

url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getUltraSrtNcst'
params ={'serviceKey' : 'DBbxKUDjM9DmJ02j387cMw72prjqtuZ7HKUOyYw+YribvhKzCPgz/ME8haN6A1JQBYasuv3ayYmeL6DJvWYvVg==', 'pageNo' : '1', 'numOfRows' : '10', 'dataType' : 'JSON', 'base_date' : '20221115', 'base_time' : '0600', 'nx' : '55', 'ny' : '127' }
response = requests.get(url, params=params)                         # GET ������� ���ϴ� �����͸� �� ������ ��û�Ͽ� respons�� ����

if (response.status_code >= 200) or (response.status_code < 300):   # HTTP request�� ������ ���
    r_dict = json.loads(response.text)    # json.loads �Լ��� JSON ��ü�� ���ڿ�(��, "{'a':1,'b':2}")�� JSON ��ü(��, {'a':1,'b':2})�� ��ȯ
                                          # json.dumps �Լ��� JSON ��ü(��, {'a':1,'b':2})�� JSON ��ü�� ���ڿ�(��, "{'a':1,'b':2}")�� ��ȯ
    #print(r_dict)                        # for debugging, print of json data
    pprint(r_dict)                        # for debugging, pretty print of json data

    r_resultcode = r_dict["response"]["header"]['resultCode']
    r_item = r_dict["response"]["body"]["items"]["item"]

    if r_resultcode == '00':
        for item in r_item:
            if(item.get("category") == "T1H"):   # ���(T1H)
                result = item
                break

print(result)
print("===================================================")
print("Forecast date (YYMMDD): " + result['baseDate'])
print("Forecast time (hhmm): " + result['baseTime'])
print("Temperature (C): " + str(result['obsrValue']))
print("===================================================")
