# DVWA@FeiFei

## Brute Force、Command Injection


---

## Damn Vulnerable Web Application


---

### 安裝DVWA in docker
`sudo docker run -d -it -p 80:80 vulnerables/web-dvwa`

---

### 安裝Brute suite
- [下載](https://portswigger.net/burp/communitydownload)
- `chmod +x 下載下來的.sh`
- `./下載下來的.sh`

---

## Webapp

- 網路版的應用程式
- 透過連結Web Server(伺服器)
- 讓我們能在**瀏覽器**下執行該應用程式
- 舉例：Web Mail、網路銀行、線上購物


---

- 想練習實戰
    - 但是怕被警察叔叔抓走
- 沒關係
    - 我們有DVWA

---

DVWA本人
![](https://i.imgur.com/kX0RlLN.png)

---

- 預設帳號密碼
admin/password

---

- 點選 Setup / Reset DB
- 可知道
    - 作業系統(OS)使用Unix
    - 資料庫使用MySQL
    - PHP版本為7.0.3
    - 其他PHP設定

---

![](https://i.imgur.com/DQgGlBw.png)

---

自己玩壞了，請點 `Create / Reset Database`

![](https://i.imgur.com/4HRcZxj.png)

---

### DVWA平台提供安全性修改
- Low
    - 完全沒有安全措施
- Medium
    - 有保護，但沒有保護到
- High
    - 有保護，但仍可透過其他方式繞過保護
    - <font color=red>CTF比賽多為這種等級</font>
- Impossible
    - 安全的，**當然請記得世界上沒有絕對的安全**
    - 提供原始碼可以參考(讓開發者了解如何撰寫)



---

![](https://i.imgur.com/P32Xa3C.png)

---

### 左邊區塊:可練習之弱點
- Brute Force（暴力（破解））
- Command Injection（命令行注入）
- CSRF（跨站請求偽造）
- File Inclusion（文件包含）
- File Upload（文件上傳）
- Insecure CAPTCHA （不安全的驗證碼）
- SQL Injection（SQL注入）
- SQL Injection（Blind）（SQL盲注）
- Weak Session IDs
- XSS (DOM)
- XSS（Reflected）（反射型跨站腳本）
- XSS（Stored）（存儲型跨站腳本）
- CSP Bypass
- JavaScript


---

### 起手式─弱密碼
- 易於猜測的密碼
- 順序或重複的字串
    - `12345678`
    - `!QAZ@WSX`
    - `0000`
- 生日(出生年月日)
- 電話

---

#### 常見弱密碼

- admin/password
- root/root
- 1qaz2wsx/qwertyuiop
- 123456/monkey

---

#### 強密碼
- 長度長排列隨機
- 台灣人常用的密碼─使用注音
    - `gjcl42.gjiy4ru3cp3gj94`
- 隨機字串
- 特殊符號


---

### Brute Force（暴力破解)
- 密碼破解攻擊
- 不停嘗試

---

#### 攻擊手法
- 使用字典檔
    - 包好的密碼字典
- 使用暴力破解軟體

---

#### burpsuite

- 暴力破解工具
- [詳細介紹](https://t0data.gitbooks.io/burpsuite/content/)
- `chmod +x 下載下來的.sh`
- `./下載下來的.sh`

---

##### 打開軟體(免費版的)
![](https://i.imgur.com/4NqdRIw.png)

---

##### 點選NEXT
![](https://i.imgur.com/cn59G4Bl.png)


---

##### 點選START BRUP

![](https://i.imgur.com/dby8LeC.png)

---

##### 等待

![](https://i.imgur.com/dmIYAZ9.png)

---

##### 成功開啟
![](https://i.imgur.com/7sWRahn.png)

---

#### PROXY

![](https://i.imgur.com/lMBreke.png)


---


![](https://i.imgur.com/lvejcD4.png)


---

![](https://i.imgur.com/WrDhtE2.png)



---

![](https://i.imgur.com/zDauDaM.png)


---

![](https://i.imgur.com/uMDqQeF.png)

---

#### Firefox options

![](https://i.imgur.com/AhDezJe.png)


---

![](https://i.imgur.com/2lmUCYt.png)

---

![](https://i.imgur.com/FeOd0Fd.png)



---

##### 軟體設定

![](https://i.imgur.com/az3JYSA.png)

---

![](https://i.imgur.com/vVDe793.png)


---

![](https://i.imgur.com/FPl8ip1.png)


---

![](https://i.imgur.com/2CfZ27j.png)

---

![](https://i.imgur.com/G1d8ym9.png)

---

![](https://i.imgur.com/tz2ojzp.png)


---

![](https://i.imgur.com/1yMXH9U.png)



---

![](https://i.imgur.com/CfXCuj1.png)

---

![](https://i.imgur.com/nRvR5yc.png)


---

![](https://i.imgur.com/QhsH9ZL.png)


---

### Command Injection
![](https://i.imgur.com/oOwu5Ahl.png)


---

#### PING
- 網路基本判斷指令
- `ping IP`
- 簡單說，就是由執行 ping 的主機送出資料給另一主機，並等待其回應，以檢查兩台主機間之網路狀況的工具。

---

#### 複習Linux指令



| 指令 | 說明 | 
| -------- | -------- | 
| ls     | 列出目錄目前檔案     |
|mkdir|建立資料|
|cd |切換目錄|
|pwd|顯示目前所在目錄|
|cat|檔案內容列出|

---

#### 機敏資料的所在地

![](https://i.imgur.com/qGEkk8x.png)

![](https://i.imgur.com/YPoUJL4.png)


---

#### 正常使用方式
![](https://i.imgur.com/1M4dNIn.png)

---

#### 右下角有原始碼可以看


```php=
<?php 

if( isset( $_POST[ 'Submit' ]  ) ) { 
    // 得到輸入
    $target = $_REQUEST[ 'ip' ]; 

    // Determine OS and execute the ping command. 
    if( stristr( php_uname( 's' ), 'Windows NT' ) ) { 
        // 如果是Windows系統
        $cmd = shell_exec( 'ping  ' . $target ); 
    } 
    else { 
        // Unix 
        $cmd = shell_exec( 'ping  -c 4 ' . $target ); 
    } 

    // 將cmd的內容直接吐回去前端
    echo "<pre>{$cmd}</pre>"; 
} 

?> 
```

---

#### 重要函式
- stristr(string,search,before_search)
- php_uname(mode)


---

#### 發現可以沒有輸入內容判斷
- Linux指令可以一行多命令
    - 試試看pipe ` |`

![](https://i.imgur.com/5w4gjuU.png)


---

#### 比較 | && || ;
- &&
    - (第2條命令只有在第1條命令成功執行之後才執行。)
- ||
    - (只有||前的命令執行不成功時，才執行後面的命令。)
- ;
    - (順序執行多條命令，當;號前的命令執行完（不管是否執行成功），才執行;後的命令)


---

#### Payload


```
127.0.0.1

127.0.0.1 ; ifconfig

127.0.0.1 ; ls

127.0.0.1 ; cd 

127.0.0.1 ; cd  /var/www
 
127.0.0.1 ; cat index.php

127.0.0.1 ; cat /etc/passwd 
```

---

![](https://i.imgur.com/1SoEAAT.png)


---

#### 撰寫程式時危險的API-1

- [如何測試一個網站有Command Injection弱點](https://www.owasp.org/index.php/Testing_for_Command_Injection_(OTG-INPVAL-013))

- 找到原始碼開始Code review
    - Python
        - exec
        - eval
        - os.system
        - os.popen
        - subprocess.popen
        - subprocess.call

---

#### 撰寫程式時危險的API-2
- 找到原始碼開始Code review
    - PHP
        - system
        - shell_exec
        - exec
        - proc_open
        - eval
        - passthru
        - proc_open
        - expect_open
        - ssh2_exec
        - popen

