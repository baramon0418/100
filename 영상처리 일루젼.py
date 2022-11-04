def Erosion(img_input, mask):
    w_input, h_input = img_input.shape
    w_mask, h_mask = mask.shape
    w_bound = int((w_mask-1)/2)
    h_bound = int((h_mask-1)/2)

    img_out = np.zeros([h_input,w_input])
    for r in range(h_input):
        for c in range(w_input):
            value = img_input[r,c]

            for r_mask in range(-h_bound, h_bound+1, 1):
                for c_mask in range(-w_bound, w_bound+1, 1):
                    img_r = r+r_mask
                    img_c = c+c_mask
                    if(img_r < 0):
                        continue
                    if(img_r >= h_input):
                        continue
                    if(img_c < 0 ):
                        continue
                    if(img_c >= w_input):
                        continue
                    if(mask[r_mask+1, c_mask+1] == 1):
                        if value > img_input[img_r, img_c]:
                            value = img_input[img_r, img_c]
            img_out[r,c] = value
    return img_out
