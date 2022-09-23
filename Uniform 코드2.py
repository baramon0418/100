import cv2
import matplotlib.pyplot as plt

img = cv2.imread("img/lena_color_512.png")
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)

plt.imshow(img)
img_gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)

np.linspace(25,245,16) 

a = np.array([[25,39],
                 [40, 54],
                 [55,69],
                 [70,83],
                 [84,98],
                 [99,113],
                 [114,127],
                 [128,142],
                  [143,157],
                  [158,171],
                  [172,186],
                  [187,201],
                  [202,215],
                  [216,230],
                  [231,245]
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
