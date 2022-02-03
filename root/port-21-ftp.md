ftp
#
`nmap scan하고 annoynymous로 접속후 파일 얻기`

![image](https://user-images.githubusercontent.com/61821641/150982606-d1e1b5fb-4404-4963-bd55-34c0b19890d4.png)

![image](https://user-images.githubusercontent.com/61821641/150982906-c4539368-8873-4919-b5e1-44c74c6d0e90.png)
#
`local file upload`
```
put shell.php
```
![image](https://user-images.githubusercontent.com/61821641/151920008-41cf3618-ecaa-4274-8e87-41595b7d4a2b.png)
#
```
ascii # ascii mode
```
#
`telnet`
```
SYST #대상시스템 유형을 표시
PASV #수동모드 PASSIVE 모드에서 데이터는 포트 번호 1023 위의 FTP 클라이언트 포트 에서 시작되는 별도의 채널을 통해 전송됩니다 .
#ACTIVE 모드에서 데이터는 FTP 서버의 포트 20에서 시작되는 별도의 채널을 통해 전송된다.
TYPE A #파일 전송 모드를 ASCII로
TYPE I #파일 전송 모드를 바이너리로 
```
#
`ftp server software`
- [vsftp](https://security.appspot.com/vsftpd.html)
- [proftp](http://www.proftpd.org/)
- [uftp](https://www.uftpserver.com/)

![image](https://user-images.githubusercontent.com/61821641/152053897-f5790c50-4e91-4cbd-9941-ef18e40245fa.png)
