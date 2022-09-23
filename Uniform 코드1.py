import cv2
import matplotlib.pyplot as plt

img = cv2.imread("img/lena_color_512.png")
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)

plt.imshow(img)
img_gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)

a = np.round(np.linspace(25,246,16)) 

a_mean =[] 
for s in a: 
    a_mean.append(s.mean()) 

def qua(p): 
    for i in range(len(a)-1): 
        if p >= a[i] and p < a[i+1]: 
            return int(a_mean[i]) 
            
for r in range(512):
    for c in range(512):
        img_gray[r,c] = qua(img_gray[r,c])

plt.imshow(img_gray, cmap ='gray')
