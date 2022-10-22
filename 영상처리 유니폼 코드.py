import cv2
import matplotlib.pyplot as plt

import numpy as np
from PIL import Image

import copy

img = cv2.imread("lena_color_512.png")
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB) #bgr을 rgb로 바꾸는 코드
img_gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)

img_gray_uniform = copy.deepcopy(img_gray)

n = 8

# option 1
# min = 0
# max = 255

# option2
min = 255
max = 0
for r in range(0,512,1) :
    for c in range(0,512,1) :
        if min > img_gray[r,c] :
            min = img_gray[r,c]
        if max < img_gray[r,c] :
            max = img_gray[r,c]


print(min,max)
# threshold
gap = (max - min)/(n)
threshold = np.zeros(n)

for i in range(1,n,1) :
  threshold[i] = min +  i*gap

for r in range(0,512,1) :
  for c in range(0,512,1) :
    for i in range(0,n,1) :
        if img_gray_uniform[r,c] < threshold[i] :
            img_gray_uniform[r,c] = threshold[i] - gap/2
            break
        
plt.subplot(1,2,1)
plt.imshow(img_gray, cmap='gray')
plt.subplot(1,2,2)
plt.imshow(img_gray_uniform, cmap='gray')
