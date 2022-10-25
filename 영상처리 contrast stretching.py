p1 = (70,33)
p2 = (190,220)
x = np.copy(gray_level)
y1 = (p1[1]/p1[0])*x[:p1[0]]
y2 = ((p2[1]-p1[1])/(p2[0]-p1[0])) * x[:p2[0]-p1[0]] + p1[1]
y3 = ((255-p2[1])/(255-p2[0])) * x[:255-p2[0]] + p2[1]
cs = np.concatenate((y1,y2,y3))

plt.plot(cs)
