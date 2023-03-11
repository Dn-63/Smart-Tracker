from flask import Flask, render_template, request
from keras.models import load_model
import pandas as pd
import os
import numpy as np
from werkzeug.utils import secure_filename
import keras
import tensorflow as tf
from tensorflow.keras.utils import load_img, img_to_array

app = Flask(__name__)

model = load_model('model.h5')
UPLOAD_FOLDER = "uploads"

@app.route('/')
def home():
    return render_template("home.html")

@app.route('/pred')
def predict():
    return render_template("index.html")

@app.route('/out', methods =["GET", "POST"])
def output():
    class_labels = ['burger',
                'butter_naan',
                'chai',
                'chapati',
                'chole_bhature',
                'dal_makhani',
                'dhokla',
                'fried_rice',
                'idli',
                'jalebi',
                'kaathi_rolls',
                'kadai_paneer',
                'kulfi',
                'masala_dosa',
                'momos',
                'paani_puri',
                'pakode',
                'pav_bhaji',
                'pizza',
                'samosa' ]
    file = request.files["image"]
    upload_image_path = os.path.join(UPLOAD_FOLDER, file.filename)
    print(upload_image_path)
    file.save(upload_image_path)  
    img = keras.utils.load_img(upload_image_path, color_mode = "rgb", target_size=(64, 64))
    x = image.img_to_array(img)
    x = np.expand_dims(x, axis = 0)
    x /= 255

    pred = model.predict(x)
    pred = pred[0]
    label = class_labels[pred.argmax()]
    y1 = "It is a :" + label
    return render_template("output.html",y = y1)



if __name__ == '_main_':
    app.run(debug = True)