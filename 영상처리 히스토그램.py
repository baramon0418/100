def HistEqualization(img_input):
    w_input,h_input = img_input.shape
    histogram = np.zeros(256)

    for r in range(h_input):
        for c in range(w_input):
            histogram[img_input[r,c]] += 1

    histogram = histogram/(w_input*h_input)
    dense_hist = np.zero(256)
    for i in range(1,256):
        dense_hist[i] = dense_hist[i-1] + histogram[i]
    dense_hist_warp = dense_hist * 255
    tf = np.round(dense_hist_warp)
    return tf
