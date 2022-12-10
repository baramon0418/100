import cv2
import matplotlib.pyplot as plt

import numpy as np
from PIL import Image
from math import sqrt,exp

import copy
img = cv2.imread("과제1.png")
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB) #bgr을 rgb로 바꾸는 코드
img_gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)
plt.imshow(img_gray, cmap = 'gray')

mask = np.zeros([512,512])

def gaussian2d(x,y,mean_x, mean_y, sigma_x,sigma_y):
    return (1 / (sigma_x*sigma_y*2*np.pi)) * np.exp(-(x-mean_x)**2 / (2*sigma_x**2) - (y-mean_y)**2 / (2*sigma_y**2))

sigma = 2

for r in range(512) :
    for c in range(512) :
        mask[r][c] += gaussian2d(r,c,228,228,sigma,sigma) #112가 잡음의 위치가 되어야 한다
        mask[r][c] += gaussian2d(r,c,282,282,sigma,sigma)
        mask[r][c] = 1 - mask[r][c] #노치 필터 특정한 노이즈를 없앰

plt.imshow(mask, cmap = 'gray')
plt.show()

#코드 깔끔하게 한 거 위에꺼랑 똑같은 거임
mask = np.zeros([512,512])

def gaussian2d(x,y,mean_x, mean_y, sigma_x,sigma_y):
    return np.exp(-(x-mean_x)**2 / (2*sigma_x**2) - (y-mean_y)**2 / (2*sigma_y**2))

sigma = 2.5

for r in range(512) :
    for c in range(512) :    
        mask[r][c] += gaussian2d(r,c,228,228,sigma,sigma) #112가 잡음의 위치가 되어야 한다
        mask[r][c] += gaussian2d(r,c,282,282,sigma,sigma)
        mask[r][c] = 1 - mask[r][c] #노치 필터 특정한 노이즈를 없앰

plt.imshow(mask, cmap = 'gray')
plt.show()

f = np.fft.fft2(img_gray)

f = np.fft.fftshift(f)

magnitude_spectrum = 20*np.log(np.abs(f))
phase_spectrum = np.angle(f)


result = np.zeros([512,512],dtype="complex") 
for r in range(512):
    for c in range(512):
        result[r,c] = f[r,c] * mask[r,c] 


magnitude_spectrum_result = 20*np.log(np.abs(result))

f = np.fft.ifftshift(result)

rec_img = np.fft.ifft2(f).real

plt.imshow(magnitude_spectrum, cmap = 'gray')
plt.savefig('magnitude.png')
plt.show()
plt.imshow(magnitude_spectrum_result, cmap = 'gray')
plt.show()
plt.imshow(phase_spectrum, cmap = 'gray')
plt.show()
plt.imshow(img_gray, cmap = 'gray')
plt.show()
plt.imshow(rec_img, cmap = 'gray')
plt.show()