mask = np.zeros([3,3])
mask[0,1] =1
mask[1,0] =1
mask[1,1] =1
mask[1,2] =1
mask[2,1] =1

#클로징-오프닝
result = Dilation(img_gray, mask)
result = Erosion(result,mask)
result = Erosion(result,mask)
result = Dilstion(result,mask)

#오프닝-클로징
result = Erosion(img_gray,mask)
result = Dilation(result,mask)
result = Dilation(result,mask)
result = Erosion(result,mask)

plt.subplot(1,3,1)
plt.imshow(img_gray, cmap='gray')
plt.subplot(1,3,2)
plt.imshow(result, cmap='gray')
plt.subplot(1,3,3)
plt.imshow(result, cmap='gray')
