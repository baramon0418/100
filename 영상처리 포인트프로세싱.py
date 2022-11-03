def PointProcessing(img_input,tf):
    w_input, h_input = img_input.shape
    img_gray_tf = np.zeros([w_input, h_input])
    for r in range(h_input):
        for c in range(w_input):
            img_gray_tf[r,c]=tf[img_input[r,c]]
        return img_gray_tf

def GeneralTF(mode):
    tf=np.zeros(256)

    if(mode==0):
        for r in range(256):
            tf[r]=r
            if (r >120) and(r<150):
                tf[r]=240

    elif(mode==1):
        pass

    else:
        for r in range(256):
            tf[r] = r
    return tf
