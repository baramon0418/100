from flask import Flask
app = Flask(__name__)
@app.route("/")
def helloworld():
    return "Hello World"

@app.route("/led/on")
def led_on():
    return "LED ON"

@app.route("/led/off")
def led_off():
    return "LED OFF"
    
@app.route('/user/<name>')
def index(name):
    return "<h1>Hello World, {}!</h1>".format(name)
if __name__ == "__main__":
    app.run(host="0.0.0.0")
