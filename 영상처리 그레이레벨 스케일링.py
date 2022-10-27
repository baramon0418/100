gray_level = np.zeros(256)
for i in range(256):
    gray_level[i] = i

tf = np.zeros(256)
for i in range(256):
    tf[i]=i
    if i>120 and i<150:
        tf[i] = 240

plt.plot(img_gray,tf)
