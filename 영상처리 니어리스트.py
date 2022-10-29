img_8_before = np.zeros((240,240)) - 1

for r in range(90):
  for c in range(90):
    img_8_before[round(r * 8 / 3),round( c * 8 / 3)] = img[r,c]

print(img_8_before)
plt.imshow(img_8_before, cmap='gray')
img_8 = copy.deepcopy(img_8_before)


option = 0
for r in range(0,240,1):
    for c in range(0,240,1):
        r_index = int(r*3/8)
        r_ratio = r*3/8 - r_index
        c_index = int(c*3/8)
        c_ratio = c*3/8 - c_index
        if img_8[r,c] == -1:
            value = img[r_index, c_index]
            img_8[r,c] = value
        else:
            img_8[r,c] = img_8[r,c]
    

plt.imshow(img_8, cmap='gray')
