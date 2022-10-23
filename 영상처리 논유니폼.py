import cv2
import matplotlib.pyplot as plt

import numpy as np
from PIL import Image

import copy

img = cv2.imread("lena_color_512.png")
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB) #bgr을 rgb로 바꾸는 코드
img_gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)

img_gray_nonuniform = copy.deepcopy(img_gray)

n = 8

#--------------------메인코드--------------------------
img_array = sorted(img_gray_nonuniform.reshape(-1,))
rate=int(len(img_array)/n)

threshold = np.zeros(n)
threshold_value = np.zeros(n)
for i in range(1,n,1):
  threshold[i] = img_array[rate*i]
  threshold_value[i] = np.sum(img_array[rate*i:rate*(i+1)])/rate
threshold[n-1] = np.max(img)
#--------------------메인코드--------------------------

print(threshold)
print(threshold_value)

for r in range(0,512,1) :
    for c in range(0,512,1) :
        for i in range(0,n,1) :
            if img_gray_nonuniform[r,c] < threshold[i] :
                img_gray_nonuniform[r,c] = threshold_value[i]
                break
        
plt.subplot(1,2,1)
plt.imshow(img_gray, cmap='gray')
plt.subplot(1,2,2)
plt.imshow(img_gray_nonuniform, cmap='gray')
