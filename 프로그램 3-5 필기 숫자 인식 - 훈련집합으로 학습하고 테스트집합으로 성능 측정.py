from sklearn import datasets
from sklearn import svm
from sklearn.model_selection import train_test_split
import numpy as np

#데이터셋을 읽고 훈련집합과 테스트집합으로 분할
digit = datasets.load_digits()
x_train,x_test,y_train,y_test=train_test_split(digit.data, digit.target,train_size=0.6)

#svm의 분류 모델 svc를 학습
s=svm.SVC(gamma=0.001)
s.fit(x_train,y_train) 

res=s.predict(x_test)

#혼돈 행렬 구함
conf=np.zeros((10,10))
for i in range(len(res)):
    conf[res[i]][y_test[i]]+=1
print(conf)

#정확률 측정 후 출력
no_correct=0
for i in range(10):
    no_correct+=conf[i][i]
accuracy=no_correct/len(res)
print("화소 특징을 사용했을 때 정확률=", accuracy*100,"%")
