import cv2
import matplotlib.pyplot as plt
import numpy as np
from PIL import Image

img = cv2.imread("img/lena_color_512.png")
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)

img_gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)
units = 4

def qua(p, s): #함수
    for i in range(len(s)-1): 
        if p >= s[i] and p < s[i+1]: 
            return int(np.mean([s[i], s[i+1]])) 

def nqua(img, units): #함수
    wimg_gray = np.copy(img)
    nimg_gray = np.zeros_like(wimg_gray)
    space=[]
    value_arr = []
    value = 0
    bins = (img.shape[0] * img.shape[1])/2**units
    val, count = np. unique(img_gray, return_counts=True)

    for i in range(len(count)):
        value += count[i]
        if value >= bins:
            space.append(i)
            value_arr.append(value)
            value = 0
    space.append(val.max()+1)

    for r in range(wimg_gray.shape[0]): 
        for c in range(wimg_gray.shape[1]):
            nimg_gray[r,c] = qua(wimg_gray[r,c], space)
    return nimg_gray

nimg_gray = nqua(img_gray, units)
plt.imshow(nimg_gray, cmap ='gray')
