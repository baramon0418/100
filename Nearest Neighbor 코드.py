from google.colab import drive
drive.mount('./drive')
path_Drive = "drive/MyDrive/"
path_image = path_Drive+"ImageProcess/"

import cv2
import matplotlib.pyplot as plt

import numpy as np
from PIL import Image

import copy

img = cv2.imread(path_image+"cameraman_small.jpg", cv2.IMREAD_GRAYSCALE)
img_w, img_h = img.shape

print(img.shape)
plt.imshow(img, cmap='gray')
plt.show()
#-------------memory allocation----------------#
img_8_before = np.zeros((240,240)) - 1 #240*240으로 된 빈공간을 포함한 사진

for r in range(90): #픽셀을 잘라서 90*90을 240*240에 펼쳐놓음 150개의 빈공간
  for c in range(90):
    img_8_before[round(r * 8 / 3),round( c * 8 / 3)] = img[r,c] #90*8/3 = 240

print(img_8_before)
plt.imshow(img_8_before, cmap='gray')



#-------------------------new cell---------------------#
img_8 = copy.deepcopy(img_8_before) #완성본


#------------ user code --------------#
for r in range(240) :
  for c in range(240) :
    if img_8[r,c] == -1 :  #값이 지정되지 않은 pixel    #90짜리를 240으로 늘리는데 예를 들어 240에서 5번째 칸이 90에서는 몇번째 칸일까요? 5*8/3 반대로 해준거임 실수 나와서 반올림함
        if round(r / 8 * 3) < 90 and round( c / 8 * 3) <90:   #-1 = 공백이면 색을 채우겠다
            img_8[r, c] = img[round(r / 8 * 3),round( c / 8 * 3)] 
        else:
            img_8[r, c] = img[round(r / 8 * 3)-1,round( c / 8 * 3)-1] 
    
    


print(img_8)
plt.imshow(img_8, cmap='gray')

#90에서 240으로 크기가 커지면서 빈공간이 생긴다
#Nearest Neighbor는 주변의 값들을 가져와 채우게 된다


