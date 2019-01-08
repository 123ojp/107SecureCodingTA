import subprocess
cmd = ['node', './bot.js']

while True :
    try :
        subprocess.run(cmd, timeout = 5)
    except subprocess.TimeoutExpired :
        print('run script timeout.')

