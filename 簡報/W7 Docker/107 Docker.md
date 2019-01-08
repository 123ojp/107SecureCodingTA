---
title: 107 Docker 
tags: 大學 , 助教 , 安全程式
---


# Docker 

---

## whAt sI dOcKEr?

---

簡單來說 他是一種虛擬機(被打

---

## WhY DocKer

---

獨立、快速、多映像檔、輕便

---

今天我們要架設一個dvwa server 
```
$ sudo docker run --rm -it -p 80:80 vulnerables/web-dvwa
```
完成!

---

一般虛擬機運作
![](https://i.imgur.com/fuChjA7.png)


---

docker 運作
![](https://i.imgur.com/QF8YC8g.png)


---

比較:
| 特性 | 容器 | 虛擬機 |
| --- | --- | --- |
| 啟動 | 秒級 | 分鐘級 |
| 硬碟容量 | 一般為 MB | 一般為 GB |
| 效能 | 接近原生 | 比較慢 |
| 系統支援量 | 單機支援上千個容器 | 一般幾十個 |



---

首先我們先安裝
```
$ sudo apt-get install docker.io
```

再把它啟動
```
$ sudo service docker start
```

---

我們用虛擬機的想法
我們如果要新增一個虛擬機 命令式
```
$ sudo docker run 設定 映像檔 指令
```
注意 建立後設定無法更改
(其實也可以只是很麻煩)

---

設定方面有許多參數可以一直累加
常用到的有
參數|說明|ex|ex說明
| --- | ---|---|---|
|-p | 映射 port |-p 127.0.0.1:80:8080|把docker8080接到本機127.0.0.1:80上
| -v | 共用資料夾 | -v /var/data:/data | 把本機 /var/data 同步到 docker /data上|

---

設定方面有許多參數可以一直累加
常用到的有
參數|說明|ex|ex說明
| --- | ---|---|---|
| --name | 命名docker | --name="喔喔"| 建立的docker叫"喔喔"(如果沒設定則系統分發)|
|-d | 背景運行docker |-d | 使用 docker attach (名稱) 叫出背景運行之docker|
|-it | -i 和 -t 結合 | 必要參數 不然操作麻煩| 詳細請參考docker文件 與顯示有關|

---

```
ex.
$ sudo docker run  -it -p 127.0.0.1:80:8080 --name=test2 ubuntu /bin/bash
```

---

映像檔部分 可以自行匯入
或是直接輸入在 [docker hub](https://hub.docker.com) 上有的映像檔 它會自動下載
後面則是 你要啟動哪個軟體 我們選強大的/bin/bash 這樣甚麼軟體都可以動
ex. ubuntu
```
$ sudo docker run  -it ubuntu /bin/bash
```

---

所以我們輸入看看
```
$ sudo docker run  -it ubuntu /bin/bash
```
我們會看到root
![](https://i.imgur.com/LrK7SP2.png)
這已經是在docker 虛擬機裡面了
這時我們在這裡安裝什麼都與外界無關

---

然後我們輸入exit 
就會退出我們呼叫docker裡的bash
同時 因為bash關閉了 docker也跟著關閉了
我們輸入 下面指令查看docker狀態
```
$ sudo docker ps -a
```
![](https://i.imgur.com/mSmlO9j.png)


---

如果我們要再開啟docker 就下
```
$sudo docker start (名稱)
```
然後 連上他 (和-d參數一樣)
```
$ sudo docker attach (名稱)
```
![](https://i.imgur.com/zHqdbfA.png)

---

如果要直接關閉也可以下
```
$ sudo docker stop (名稱)
```

---

如果要把其中一個docker砍掉下
```
$ sudo docker rm (名稱)
```
前提是他要停止

---

一個docker 不只能開一個程式(bash)
要開第二個的話 就再啟動一個bash並輸入
```
$ sudo docker exec -it (名稱) (程式)
$ sudo docker exec -it test2 /bin/bash
```
![](https://i.imgur.com/tHXlYui.png)
(其中-it 跟run參數一樣)


---

那我們來用docker架設一個DVWA吧

```
$ sudo docker run --rm -it -p 80:80 vulnerables/web-dvwa
```


---

建立完之後 連連看
http://127.0.0.1/
