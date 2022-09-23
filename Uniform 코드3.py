import cv2
import matplotlib.pyplot as plt

img = cv2.imread("img/lena_color_512.png")
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)

plt.imshow(img)
img_gray = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)

bins = np.linspace(0, img_gray.max(), 2**4)
digi_image2 = np.digitize(img_gray, bins)
digi_image2 = (np.vectorize(bins.tolist().__getitem__)(digi_image2-1).astype(int))

plt.imshow(digi_image2)
