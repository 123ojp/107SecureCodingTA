from flask import Flask, send_file,request,Response
app = Flask(__name__)

methods = ["GET","POST","DELETE","PUT","HAPPY","CTF","A","B","D","XD","WOW","END","GET"]
flag = "CTF{method?}"

@app.route("/",methods=methods)
def main():
    i = 0
    for method in methods:
        if request.method == method:
            resp = Response(flag[i])
            resp.headers['Next_Method'] = methods[i+1]
            return resp
        i+=1
    return "?"


if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True, port=80)
