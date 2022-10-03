from google.colab import drive
drive.mount('./drive')
path_Drive = "drive/MyDrive/"
path_image = path_Drive+"ImageProcess/"

import cv2
import matplotlib.pyplot as plt

import numpy as np
from PIL import Image

import copy
import math

img = cv2.imread(path_image+"cameraman_small.jpg", cv2.IMREAD_GRAYSCALE)
img_w, img_h = img.shape

print(img.shape)
plt.imshow(img, cmap='gray')
plt.show()
#-------------memory allocation----------------#
img_8_before = np.zeros((240,240)) - 1 #240*240으로 된 빈공간을 포함한 사진

for r in range(90): #픽셀을 잘라서 90*90을 240*240에 펼쳐놓음 150개의 빈공간
  for c in range(90):
    img_8_before[round(r * 8 / 3),round( c * 8 / 3)] = img[r,c] #90*8/3= 240

print(img_8_before)
plt.imshow(img_8_before, cmap='gray')



#-------------------------new cell---------------------#
img_8 = copy.deepcopy(img_8_before) #완성본


#------------ user code --------------#
for r in range(240) :
  for c in range(240) :
    if img_8[r,c] == -1 :  #값이 지정되지 않은 pixel  #-1 = 공백이면 색을 채우겠다     
        if math.ceil(r / 8 * 3) < 90 and math.ceil( c / 8 * 3) < 90:
            x_floor=math.floor(r/8*3) 
            x_ceil=math.ceil(r/8*3)
            y_floor=math.floor(c/8*3)
            y_ceil=math.ceil(c/8*3)
            v1=img[x_floor,y_floor] #좌상단
            v2=img[x_floor,y_ceil] #우상단
            v3=img[x_ceil,y_floor] #좌하단
            v4=img[x_ceil,y_ceil] #우하단
            rat_x = c/8*3 - math.floor(c/8*3) #좌우비율 
            rat_y = r/8*3 - math.floor(r/8*3) #상하비율
            img_8[r, c] = round((1-rat_y)*((1-rat_x)*v1 + rat_x*v2) + (rat_y)*((1-rat_x)*v3 + rat_x*v4)) #픽셀값 넣는 거
                                    
        else:
            img_8[r, c] = round((1-rat_y)*((1-rat_x)*v1 + rat_x*v2) + (rat_y)*((1-rat_x)*v3 + rat_x*v4))
                                    
    
    


print(img_8)
plt.imshow(img_8, cmap='gray')

#올림한 거에서 원본을 빼면 원본에서 버림한 거를 뺀거를 더하면 1이 된다
#Interpolation(Bilinear)는 선이 명확하게 보이지 않는다는 특성을 가지고 있다
#Bilinear Interpolation는 비율을 가지고 이야기하기 때문에 좌우비율과 상하비율을 구했다

