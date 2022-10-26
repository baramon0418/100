gray_level = np.zeros(256)
for i in range(256):
    gary_level[i] = i

tf = np.zeros(256)
c=255**(0.5)
gamma=0.5
for i in range(256):
    tf[i] = c*(i**gamma)

plt.plot(gray_level, tf)
