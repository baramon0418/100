import cv2
import matplotlib.pyplot as plt

img = cv2.imread("img/lena_color_512.png")
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)

plt.imshow(img)
img_gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)

a = np.array([[21,30],
                 [31, 48],
                 [49,65],
                 [66,75],
                 [76,86],
                 [87,97],
                 [98,105],
                 [106,114],
                  [115,121],
                  [122,128],
                  [129,135],
                  [136,148],
                  [149,168],
                  [169,186],
                  [187,245]
            ]) 
a_mean =[] 
for s in a: 
    a_mean.append(s.mean()) 

a_mean

def qua(p): 
    for s in a: 
        if p >= s[0] and p <= s[1]: 
            return s.mean() 
            
for r in range(512): 
    for c in range(512):
        img_gray[r,c] = qua(img_gray[r,c])

plt.imshow(img_gray, cmap ='gray')
