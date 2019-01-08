b=200000000
f = open('bigfile', 'w')
for i in range(0,int(b)):
    f.write("nope\n")
f.write("CTF{A_Big_file_HAhA}\n")
for i in range(0,int(b)):
    f.write("nope\n")
print("finish")
