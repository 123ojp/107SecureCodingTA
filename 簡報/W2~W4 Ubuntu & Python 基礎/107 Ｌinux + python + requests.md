---
title: 107 Ｌinux + python + requests  
tags: 大學 , 助教 , 安全程式
---


# Ubuntu

他是從 linux 系統 開發出來的

---

首先打開虛擬機
![](https://i.imgur.com/A6Z7E2I.png)

---

選擇Ubuntu 按啟動
![](https://i.imgur.com/lgdXVC6.png)
密碼是:Hadoop123


---

打開Ubuntu
![](https://i.imgur.com/xfPWi7u.jpg)

---

首先我們先了解linux系統的硬碟架構
我們打開 檔案管理(?)
![](https://i.imgur.com/atRVP6s.png)

---

點選 Computer
我們可以看到 左上角寫著 "\/"
這代表**根目錄**
liunx系統 所有資料夾都從'\/'開始
而不是像win 由C:\
![](https://i.imgur.com/s9IlWHd.png)



---

由剛剛那張圖
我們可以看到系統所有檔案都從'\/'衍生
所以我們自己個人資料都習慣丟在使用者目錄下

```
windows的使用者資料夾路徑
C:\Users\使用者名稱\
linux使用者資料夾路徑
/home/使用者名稱/
等同 “~”
```

---

我們打開到自己使用者資料夾裡
會看到系統幫你分類好(限桌面版)
跟windows很像
![](https://i.imgur.com/TXM9uFbl.png)

---

在桌面版我們複製檔案很容易
右鍵該有的東西都有
![](https://i.imgur.com/xsOz0zg.png)

---

但為了之後我們要用伺服器版
所以我們要開始用指令
我們把終端機叫出來
在任何地方按右鍵選則 Open in Terminal
![](https://i.imgur.com/Sctj4XBl.png)

---

好我們把終端機叫出來了
我們以後用伺服器版本的系統就只會有這個框框
要操作電腦就靠它
![](https://i.imgur.com/zm9GUjb.png)

---

簡單複習一下
```
(我懶得重打Linux版 用windows版複習)
```

---


指令部分
```bash=
使用者名稱@電腦名稱:路徑$ 下指令地方
```
![](https://i.imgur.com/zm9GUjb.png)

---

例子:
```bash=
o123ojp@ubuntu:~$ ping 8.8.8.8
```
意義: 在~ (家目錄) 底下 執行ping 參數8.8.8.8

系統會先找 當前路徑(~)有沒有叫ping 的軟體
if 沒有 
找設定好的軟體
然後 把8.8.8.8 給ping這軟體執行 

---

執行結果如下
ping 這軟體是丟網路封包給 指定IP(參數) 
看time(回應速度)就可知道網路穩不穩
![](https://i.imgur.com/B52CpIh.png)


---

路徑分兩種
```
/──┐
   ├──folder1─┐
   |          └123.txt
   ├──folder2─┐
   |          └app2.exe
   └──app.exe
```
絕對路徑 就像是 絕對座標 直接告訴你經緯度
ex1. 123.txt的絕對路徑是 /folder1/123.txt
ex2. app.exe的絕對路徑是 /app.exe


---

```
/──┐
   ├──folder1─┐
   |          └123.txt
   ├──folder2─┐
   |          └app2.exe
   └──app.exe
```
相對路徑 就是相對來講 我在7-11對面 
每個資料夾有格外 兩個資料夾
```
一個叫 ./ 另一個叫 ../
./ 是指 當前路徑
../是指 他上面那個路徑
```

---

```
/──┐
   ├──folder1─┐
   |          └123.txt
   ├──folder2─┐
   |          └app2.exe
   └──app.exe
```
假如現在我位子在/folder1
ex1. 123.txt 的路徑是: ./123.txt
ex2. app.exe 的路徑是: \.\./app.exe
ex3. app2.exe 的路徑是 \.\./folder2/app2.exe 
假如現在我位子在/
ex4. 123.txt的路徑 folder1/123.txt


---


指令:cd 
這個指令是幫你更改 當前路徑 
![](https://i.imgur.com/tU4gOSx.png)


---

使用方法
```=bash
$ cd 路徑
```


---

假如我們C碟長這樣
```
/──┐
   ├──folder1─┐
   |          └123.txt
   ├──folder2─┐
   |          └app2.exe
   └──app.exe
```
你想執行app那就輸入這串指令
```=cmd
/$ app
```

如果你想執行app2有好幾種方式種方式
```cmd=
相對路徑 : $  floder2/app2.exe
絕對路徑: $  /floder2/app2.exe
```

---

```
/──┐
   ├──folder1─┐
   |          └123.txt
   ├──folder2─┐
   |          └app2.exe
   └──app.exe
```
或是
```cmd=
先變更資料夾:
/$  cd floder2
/floder2 $  app2.exe
```

---

如果你想回到 家目錄

```cmd=
/floder2 $ cd ~
~$
```
大家試試看吧

---


基礎指令教學

---

| 指令           | Full name          | 
| ------------- |:-------------:| 
|cd             |(Change directory)切換目錄
|mkdir          |(Make directory)建立目錄
|ls             |(List)列出
|pwd            |(Print working directory)現在路徑
|rm             |(Remove)刪除
|mv             |(Move)移動
|cat            |(Catenate(讀檔)
|touch          | 建立一個空的檔案

---

ex. 列出資料夾檔案
```
~$ ls
```
![](https://i.imgur.com/wphTjLn.png)


---

ex. 創建一個檔案
```
~$ touch 要建立的檔案名稱
~$ touch imakeafile
```
![](https://i.imgur.com/HbANHMS.png)

---

ex. 重新命名(移動一個檔到同一個資料夾)
```
~$ mv 移動檔案名稱 移動目的
~$ mv imakeafile rename
```
![](https://i.imgur.com/dWN47jA.png)


---

ex. 讀檔(檔案要有文字)
```
~$ cat rename
```
![](https://i.imgur.com/lLk4Qdt.png)

---

ex. 移除檔案
（注意！ 無法返還）
```
~$ rm rename
刪除資料夾 請下
~$ rm -rf 資料夾名稱
```

![](https://i.imgur.com/amC0T84.png)


---

接下來講編輯器
通常有 vi vim nano...
我比較常用vim 所以教他

---

首先我們要先安裝vim(linux vi通常會內建)
所以我們要來教"ubuntu"(其他作業系統不同)的套件管理
# apt-get

---

apt-get跟pip有點像
安裝程式指令如下
```bash=
$ apt-get install 程式名稱
```
馬上試試
```bash=
$ apt-get install vim
```

![](https://i.imgur.com/XxOvzj3.png)


---

噴錯了呢，為什麼呢？
上面寫Permission denied（沒有權限）, are you root
還記得我們在用pip要用「系統管理員」執行吧
這裡也一樣
要用「sudo」這個指令 
他會以系統管理員(root)身份幫你執行後面指令

---

所以看到Permission denied 記得+sudo
大部分問題都可以解
```bash=
$ sudo apt-get install vim
```
然後他會跳出要求輸入你密碼
輸入完案enter
(他不會有字元增加 不要以為沒輸入到)
![](https://i.imgur.com/hRHG3As.png)


---

然後他會問你會使用多少空間要不要繼續
這邊給他Y就好
![](https://i.imgur.com/j8ZKCId.png)

---

然後等它安裝
![](https://i.imgur.com/ixZONGY.png)


---

接下來我們來介紹如何使用vim
vim 檔案名稱就會開啟編輯器
```
$ vim 檔案名稱
```
檔案存在就會直接打開編輯
不存在他會幫你開新檔案

---

我們建立test.txt 進入到編輯畫面
```
$ vim test.txt
```
![](https://i.imgur.com/qjkTDZ3.png)

---

現在這個狀態是選功能模式
這裡按下鍵盤 “i" 就可以進入編輯模式
開始輸入文字(左下角顯示 insert)

![](https://i.imgur.com/zItXO0p.png)

---

輸入完案esc 會回到選功能模式
![](https://i.imgur.com/JroASql.png)

---

按下shift+;(就是輸入分號拉)
會進入指令模式
![](https://i.imgur.com/27u56Wh.png)

---

vim基本指令(其他自己查)

| 指令           | 功能          | 
| ------------- |:-------------:| 
| :w            |寫入檔案|
| :q |離開(限沒有更改檔案)|
| :q!|強制離開(不管檔案有無存檔)|
| :wq | 寫檔+離開|
| :w! |強制寫檔|
| :wq!| 強制寫檔後離開|

---

我們試試看:w
![](https://i.imgur.com/Evn7saI.png)
然後案enter
![](https://i.imgur.com/uN6eKea.png)

---

寫檔成功
![](https://i.imgur.com/sicMuSX.png)
輸入:q 離開
![](https://i.imgur.com/ndmFzjO.png)
![](https://i.imgur.com/bdFUPQk.png)

---

補充：vim 中文亂碼怎麼辦

一樣 在指令上面打
```
:set encoding=utf8
```
![](https://i.imgur.com/w4T30iMm.png)
![](https://i.imgur.com/2CkV9NK.png)

---

練習
1. 用vim寫 一個HelloWorld.c
2. 用gcc編譯 `gcc HelloWorld.c`
3. 執行列印出
![](https://i.imgur.com/6bEJjSl.png)


---

## Linux pipe
`>` 輸出至某個檔案（複寫)
`>>` 輸出至某個檔案 (從檔案最後面開始)
```
$ echo "aaa" > test.txt
```
![](https://i.imgur.com/D0JDKfl.png)

---

## Linux pipe
`|`把前面輸出結果 當後面的 input 使用
```
$ cat /etc/passwd | grep root
尋找 檔案中root 那行
```
![](https://i.imgur.com/SDztsY1.png)

---

## curl 

---

他是一個幫把網路原始檔抓下來的東西
`curl ta.foxo.tw`
![](https://i.imgur.com/1Vrl63k.png)

---

她加上pipe`>` 可以拿來下載檔案
`curl http://ta.foxo.tw/files/1609adb90471840d07e69fa84fcb92da/bigfile.zip > big.zip`
![](https://i.imgur.com/7Hgc3bJ.png)


---

# 練習 
- 大檔案
![](https://i.imgur.com/D2hjC1t.png)


---

#  python ubuntu安裝

---

# 開啟 終端機
![](https://i.imgur.com/1g1RjGi.jpg)

---

# 下安裝指令 && 輸入自己密碼
`sudo apt install python2.7 python-pip`
![](https://i.imgur.com/sT6nfsZ.png)

---

# 安裝完後 輸入python2.7 看是否安裝成功
輸入`exit()`離開
![](https://i.imgur.com/MymDXZl.png)


---

# python 簡介
 - 直譯式語言
 - 很多套件
 - 分2、3版本

---

# Hello World
```python=
print "Hello World!"
```
不要自動換行 了話
```python=
print "Hello",
print " World"
# 輸出 Hello World
```

---

### 註解

單行註解使用`#`
大型註解使用 `'''` 包起來
同時他也是字串
```python=
#我是註解
'''
我是註解
巴拉
'''
a = '''
我也是字串格式
'''
```

---

# 變數宣告
```python=
a = 1
b = "word"
c = True
d = False
```

---

# 查看變數型態
```python=
a = 1
print type(a)
# <type 'int'>
```

---

# 刪除變數

```python
del 變數名稱1, 變數名稱1, ...
```

---

# 字串索引
```python=
a = "asdf"
print a[0:2] #as
print a[-1] #f
```
python字串有兩種取值順序
- 從左到右索引從0開始
- 從右到左索引從-1開始

| 字串 | a | s | d | f |
| --- | --- | --- | --- | --- |
| 第一種索引  | 0 | 1 | 2 | 3 |
| 第二種索引  | -4 | -3 | -2 | -1 |

---

# 字串 相加 (型態一樣)
```python=
a = "asdf"
b = "fdsa"
d = 1
a+=b
print a #asdffdsa
c = a + "嗨" + b + str(d)
```

---

# 列表

```python
變數 = [東西1, 東西2, ...]
a = ['a','b',2] #合法
```

---


## 列表索引與字串一樣

```python
變量[上標:下標]
```

---

## 列表增加
- `list.append(要加的元素)`
    - 加在尾巴
    - 只能加一個
- `list.extend(要加的串列)`
    - 從最後面開始加
    + 可以加很多個
- `list.insert(要插入的index, 插入的元素)`

---

## 刪除列表元素
- `del list[index]`
        - 刪掉某一項
- `list.pop(index)`
    - 如同stack一樣 
- `list.remove(要刪的元素)`

---

## 列表排序
- `list.sort(reverse=False)`
- `reverse = True`
    - 由大排到小
- `reverse = False`
    - 由小排到大


---

# 字典
```python
變數 = {key1:value1, key2:value2, ...}
```

key是唯一的，如果重複，最後一個key的value會代替前面的

value可以重複沒關係

**key可以是字串、數字，但不能是列表**

---

## 字典拿取
只能用key 找 value 
```python=
a = {
    'key':'value'
}
print a['key'] #輸出:value
```

---

是否有直
```python=
a = {"11":"bb"}
print ("11" in a)
# True
print ("22" in a)
# False
```

---

還可以這樣
```python=
a = {"11":"bb"}
b = "11"
print a[b]
# bb
```

---

# 字典與For
```python=
a={1:2,3:4,5:6}
for key, value in a.items():
    print "key: "+str(key)+ " value: "+ str(value)
```

---

# 轉型(int)
```python=
a = "123"
a = int(a)
```

```python=
a = "1010111" 
a = int(a,2) # 二進位
print a #87
```

---

# 幾乎所有型態都能轉成(str)
```python=
a = 123
a = str(a)
a = float(a)
```

---

# 邏輯運算子

| 運算子 | 意義 |
| --- | --- |
| `not` | 相反 |
| `and` | 兩者為真材為真 |
| `or` | 其中一者為真即為真 |

---

#### 複合指定運算子

| 運算子 | 意義 |
| --- | --- |
| `+=` | 相加後在丟給原變數 |
| `-=` | 相減後在丟給原變數 |
| `*=` | 相乘後在丟給原變數 |
| `/=` | 相除後在丟給原變數 |
| `%=` | 取餘數後在丟給原變數 |
| `//=` | 取商數後在丟給原變數 |
| `**=` | 取次方後在丟給原變數 |

---

# 判斷式

判斷式基本語法
***空行很重要***

```python
if (條件式一):
    條件式一成立，要做的事

elif (條件式二):
    條件式二成立，要做的事

else:
    上述條件式都不成立，要做的事
```

---

# for迴圈 
基本上 是foreach 

```python
for 變數 in 串列:
    要做的事
    break
    continue
```

---

## for range
```python=
for i in range(1,10):
    print i
```
事實上 range(1,3)==[1,2]


---

# while迴圈

while迴圈基本語法

```python
while (條件):
    條件成立要做的事
```

---

# 函數

基本語法
```python
def 函數名稱(要傳進去的參數):# 不用宣告型態
    要做的事
    return 要吐出來的東西 # 如果是void就不用return
```

---

# 函數示範
```python=
def fun(a):
    return a + 1
print fun(2) #輸出 3
```

---

# 那我們來印菱形吧
```python=
      * 
    * * *   
  * * * * *     
* * * * * * *       
  * * * * * 
    * * * 
      * 
```


----

```python=
def make(rows):
    for i in range(0,rows):
        for j in range(0,rows-(i+1)):
            print " ",
            j += 1
        for k in range(0,(rows-1)*i+1):
            if k>=2*i+1 :
                print " ",
            else:
                print "*",
            k += 1
        print ""
    i += 1
    for i in range(0,rows-1):
        for j in range(0,i+1):
            print " ",
            j += 1
        for k in range(0,2*((rows-1)-i)-1):
            print "*",
            k += 1
        print ""
    i += 1
make(4)
```

---

### pip (python 套件管理)
安裝 常用套件 `sudo pip install requests bs4 pwntools`
![](https://i.imgur.com/DmRJ0cK.png)

---

### 安裝完後 進python 確定是否安裝成功
```python=
from pwn import *
import requests
```
沒有提示代表成功
![](https://i.imgur.com/nq3ui7K.png)

---


### pede gdb 安裝
首先 先安裝 git
`sudo apt install git`
![](https://i.imgur.com/NU4wRo9.png)


---

使用git 安裝 peda gdb
```
git clone https://github.com/longld/peda.git ~/peda
echo "source ~/peda/peda.py" >> ~/.gdbinit
```
![](https://i.imgur.com/g9VDeJQ.png)

---

### 開啟gdb 看看是否成功
輸入`q`離開
![](https://i.imgur.com/mzWirKo.png)


---

### requests 應用
今天看到一題 長這樣
[題目](http://140.134.25.138:10012/)
![](https://i.imgur.com/Tdw5oMg.png)

---

### 按下去 
看起來要多按幾次
但要按幾次呢？
![](https://i.imgur.com/xB3ST3h.png)

---

# 只好寫腳本

---

## 如何用python呢？
先引入requests 套件
```python=
import requests
```

---

### 建立一個session 並拿取第一次網頁
```python=+
r = requests.Session() #建立session存cookies
index = r.get("http://140.134.25.138:10012/index.php")
print index.text
```
![](https://i.imgur.com/gN4EoYW.png)

---

### 如何看網頁丟出什麼給伺服器
![](https://i.imgur.com/jFINtwL.png)


---

### 如何切出要的參數
使用 bs4 的  BeautifulSoup
```python=
from bs4 import BeautifulSoup
```

---

把 字串拿去編碼
```python=
soup = BeautifulSoup(index.text, "html.parser")
```

---

### 查看要的東西標籤特徵
![](https://i.imgur.com/nSwBjQo.png)
我們要 `input` 標籤 名叫 `token` 的 value
```python=
token = soup.find('input',{'name':'token'})
print token
```

---

切出要的 value
```python=
print token['value']
print token['class']
```

---

# 可以用findAll找全部標籤
```python=
h1_list = soup.findAll('h1')
for h1 in h1_list:
    print h1.text
```

---

### 串起來試試看
```python=
import requests
from bs4 import BeautifulSoup
r = requests.Session()
index = r.get('http://140.134.25.138:10012/index.php')
soup = BeautifulSoup(index.text, "html.parser")
token = soup.find('input',{'name':'token'})['value']
print token
```

---

![](https://i.imgur.com/nRbPSQu.png)


---

接下來要怎麼丟出去給伺服器？
```python=
data= {'token' : token}
index = r.post('http://140.134.25.138:10012/index.php',data=data)
```
![](https://i.imgur.com/oYS7Qhh.png)


----

```python=
import requests
from bs4 import BeautifulSoup
r = requests.Session()
index = r.get('http://140.134.25.138:10012/index.php')
while True:
    soup = BeautifulSoup(index.text, "html.parser")
    token = soup.find('input',{'name':'token'})['value']
    data= {'token' : token}
    index = r.post('http://140.134.25.138:10012/index.php',data=data)
    message = soup.find('h1' ,{'name':'flag'}).text
    if not(message=="CTF{NOT_THIS_ONE}" or message==""):
        print (message)
        break
```

---

### 給他跑一下
![](https://i.imgur.com/ExaJLWf.png)




---
