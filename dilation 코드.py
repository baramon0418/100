import cv2
import matplotlib.pyplot as plt

import numpy as np
from PIL import Image

import copy

img = cv2.imread("morphology_sample2.png")
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB) #bgr을 rgb로 바꾸는 코드
img_gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)
plt.imshow(img_gray, cmap='gray')

h,w = img_gray.shape

img_out = np.zeros([h,w])

dilation_mask = np.zeros([3,3])
dilation_mask[0,1] = 1
dilation_mask[1,0] = 1
dilation_mask[1,1] = 1
dilation_mask[1,2] = 1
dilation_mask[2,1] = 1

for r in range(h) :
  for c in range(w) :
    value = img_gray[r,c]

    for r_mask in range(-1,2,1) :
      for c_mask in range(-1,2,1) :
        img_r = r + r_mask
        img_c = c + c_mask        
        if(img_r < 0) :
          continue
        if(img_r >= h) :
          continue
        if(img_c < 0) :
          continue
        if(img_c >= w) :
          continue
        if(dilation_mask[r_mask+1,c_mask+1] == 1) :
          if value < img_gray[img_r,img_c] :
            value = img_gray[img_r,img_c]
    img_out[r,c] = value 

print(dilation_mask)
plt.imshow(img_gray, cmap='gray')
plt.show()
plt.imshow(img_out, cmap='gray')
