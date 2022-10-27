gray_level = np.zeros(n)
for i in range(256):
    gray_level[i] =i

tf = np.zeros(256)
for i in range(256):
    tf[i] = 255-i

plt.plot(gray_level,tf)
