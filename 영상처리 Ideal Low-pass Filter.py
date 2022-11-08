import cv2
import matplotlib.pyplot as plt

import numpy as np
from PIL import Image

import copy

img = cv2.imread("sample2.png")
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB) #bgr을 rgb로 바꾸는 코드
img_gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)

#마스크 부분
mask = np.zeros([512,512])

def distance(x1,y1,x2,y2) :
  value = (x1-x2)*(x1-x2) + (y1-y2)*(y1-y2)
  return np.sqrt(value)

for r in range(512) :
  for c in range(512) :
    if distance(r,c,256,256) < 20 :
      mask[r,c] = 255

plt.imshow(mask, cmap = 'gray')
plt.show()

imask1 = np.fft.ifftshift(mask)

imask2 = np.fft.ifft2(imask1).real

show_mask = np.fft.fftshift(imask2)

plt.imshow(imask1, cmap = 'gray')
plt.show()
plt.imshow(imask2, cmap = 'gray')
plt.show()
plt.imshow(show_mask, cmap = 'gray')
plt.show()

#스펙트럼 부분
#dft
f = np.fft.fft2(img_gray)

#show
fshift = np.fft.fftshift(f)

#magnitude spectrun
magnitude_spectrum = 20*np.log(np.abs(fshift))

#phase specturm
phase_spectrum = np.angle(fshift)

#process
mask = np.zeros([512,512])

result = np.zeros([512,512],dtype="complex") #복소수로 선언 안되어서 수업시간에 오류 발생

def distance(x1,y1,x2,y2):
    value = (x1-x2)*(x1-x2) + (y1-y2)*(y1-y2)
    return np.sqrt(value)

for r in range(512) :
    for c in range(512) :
        if distance(r,c,256,256) < 20 :
            mask[r,c] = 255

for r in range(512):
    for c in range(512): 
        result[r,c] = fshift[r,c] * mask[r,c]

result_magnitude_spectrum = 20*np.log(np.abs(result))


iresult = np.fft.fftshift(result)

iresult_magnitude_spectrum = 20*np.log(np.abs(iresult))


#idft
rec_img = np.fft.ifft2(iresult).real

# # plt.subplot(141),
plt.imshow(img_gray, cmap = 'gray')
plt.title('Input Image'), plt.xticks([]), plt.yticks([])
plt.show()

plt.imshow(magnitude_spectrum, cmap = 'gray')
plt.title('Magnitude Spectrum'), plt.xticks([]), plt.yticks([])
plt.show()

plt.imshow(mask, cmap = 'gray')
plt.title('Mask'), plt.xticks([]), plt.yticks([])
plt.show()

plt.imshow(result_magnitude_spectrum,cmap = 'gray')
plt.title('Result'), plt.xticks([]), plt.yticks([])
plt.show()

plt.imshow(rec_img, cmap = 'gray')
plt.title('Recovery Image'), plt.xticks([]), plt.yticks([])
plt.show()
