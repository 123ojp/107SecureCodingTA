import requests


data = {
  'username':requests.get("https://shattered.io/static/shattered-1.pdf").content,
  'password': requests.get("https://shattered.io/static/shattered-2.pdf").content,
}

print requests.post('http://140.134.25.138:10017/index.php', data=data).text

