from flask import Flask, send_file
app = Flask(__name__)


@app.route("/")
def main():
    return send_file('./static/index.html')
@app.route("/app")
def appa():
    return send_file('app.py')
@app.route('/js/<path:path>')
def send_js(path):
    return send_file('js/'+path)
@app.route('/css/<path:path>')
def send_css(path):
    return send_file('css/'+path)
@app.route('/images/<path:path>')
def send_images(path):
    return send_file('images/'+path)
@app.route('/fonts/<path:path>')
def send_fonts(path):
    return send_file('fonts/'+path)

if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True, port=80)
