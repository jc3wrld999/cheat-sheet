Metasploit
#
`man`
```
use
back
set
```
![image](https://user-images.githubusercontent.com/61821641/147723626-a0455990-0a05-49c0-839b-98d0d2073752.png)
#
`portscan`

대상 시스템, 네트워크의 열린 포트를 스캔하는 여러 모듈이 있습니다. search portscan 명령 을 사용하여 사용 가능한 잠재적인 포트 스캐닝 모듈을 나열할 수 있습니다 .

![image](https://user-images.githubusercontent.com/61821641/151746499-42adae35-00c2-4597-9c10-c4ef6e1a62a2.png)


![image](https://user-images.githubusercontent.com/61821641/151746966-e5e15d49-07a5-4563-9be2-6df2a3223385.png)

- CONCURRENCY: 동시에 스캔할 대상의 수입니다.
- PORTS: 스캔할 포트 범위입니다. 여기서 1-1000은 기본 구성으로 Nmap을 사용하는 것과 같지 않습니다. Nmap은 가장 많이 사용되는 1000개의 포트를 스캔하고 Metasploit은 1에서 10000까지의 포트 번호를 스캔합니다.
- RHOSTS: 스캔할 대상 또는 대상 네트워크.
- THREADS: 동시에 사용될 스레드 수. 스레드가 많을수록 스캔 속도가 빨라집니다.
#
`udp service identify`

이 scanner/discovery/udp_sweep 모듈을 사용하면 UDP(사용자 데이터그램 프로토콜)를 통해 실행되는 서비스를 빠르게 식별할 수 있습니다. 아래에서 볼 수 있듯이 이 모듈은 가능한 모든 UDP 서비스에 대한 광범위한 스캔을 수행하지 않지만 DNS 또는 NetBIOS와 같은 서비스를 식별하는 빠른 방법을 제공합니다.

```
use scanner/discovery/udp_sweep
```
![image](https://user-images.githubusercontent.com/61821641/151747194-6b25e9b3-ee6a-48ab-bfc4-7f32403c9f0c.png)
#
`smb scan`
```
use scanner/smb/smb_version
```
![image](https://user-images.githubusercontent.com/61821641/151747349-541f08f1-9edd-454a-98a4-d38c961fd633.png)

특정 사용자의 비밀번호 bruteforce
```
use scanner/smb/smb_login
set smbuser <user name>
set pass_file <file name ex) rockyou.txt...>
run
```

![image](https://user-images.githubusercontent.com/61821641/151749881-3affc686-ba1a-416d-96fd-96a79c106f44.png)

#
`NetBIOS`
```
scanner/netbios/nbname
```
![image](https://user-images.githubusercontent.com/61821641/151747791-b5604eec-4348-4144-8ad1-da14e28507f0.png)
#
`DB`

```
systemctl start postgresql 
sfdb init
msfconsole
db_nmap -sV -p- <rhosts>
```
이제 nmap 스캔을하면 db_nmap에 저장됨 host 목록이랑 service 목록을 볼 수 있음
```
hosts
```
![image](https://user-images.githubusercontent.com/61821641/152445717-1f8826a0-9b6f-4f22-a4d6-c8b7fa5e5202.png)
![image](https://user-images.githubusercontent.com/61821641/152445763-6930ab76-01a8-4b88-b6f9-5cad71377120.png)
```
services
```
![image](https://user-images.githubusercontent.com/61821641/152445796-c573e60e-00a0-4ce3-9701-4c4d6a748a64.png)
![image](https://user-images.githubusercontent.com/61821641/152445856-e5ee9d06-82de-47ce-bc4b-1e026a1e47a3.png)
```
vulns
```
![image](https://user-images.githubusercontent.com/61821641/152451547-bbdbaaa0-528f-4011-9c19-996466ee38a2.png)
#
`Interface`

- msfconsole
- msfcli
- armitage

`Utility`

- msfpayload
- msfencode
- nasm_shell

`DB`

- mysql
- postgreSQL
#
`수동적 정보 수집`

`whois lookup`
```
msf6 > whois secmaniac.net
```
#
`auxiliary/scanner/ip/ipidseq`

TCP Idle 스캔

네트워크에 있는 다른 호스트의 IP 주소를 스푸핑해 은닉 상태로 대상을 스캔할 수 있다. 스캔을 수행할 때 ip 헤더의 ID필드의 증가를 고려해야 하므로 


#
`auxiliary/scanner/portscan/syn`


#
`auxiliary/scanner/smb/smb_version`

![image](https://user-images.githubusercontent.com/61821641/154093665-d1f2834b-0819-40b5-9fe7-c3a76f67ac83.png)

#
`auxiliary/scanner/mssql/mssql_ping`

잘못 설정된 mssql 서버 찾기

MS SQL을 설치하면 기본적으로 TCP 1433번 포트나 임의의 동적 TCP 포트로 응답 대기한다. MS SQL이 동적 포트로 대기한다면 간단히 UDP 포트 1434번으로 신호를 보내 MS SQL이 대기 중인 동적 TCP 포트를 확인할 수 있다. mssql_ping 모듈로 이 작업을 수행할 수 있다.

mssql_ping은 UDP의 timeout 문제로 인해 대상 서브넷까지 패킷이 상당히 느리게 이동할 수 있다. 메타스플로잇이 MS SQL 서버를 찾으면 서버가 대기 중인 TCP 포트 정보 같은 중요 정보와 세부 내용을 출력한다.

![image](https://user-images.githubusercontent.com/61821641/154096105-7ebff2c2-7706-4ffc-ace8-cf6646f03b68.png)

1: 서버의 위치

2: 인스턴스 명

3: 서버버전

4: 대기중인 tcp 포트 번호

#
`auxiliary/scanner/ssh/ssh_version`

ssh_version 모듈은 대상 서버에서 동작하는 SSH의 버전을 알아낸다.

#
`auxiliary/scanner/ftp/ftp_version`

ftp_version 모듈은 대상 서버에서 동작하는 FTP의 버전을 알아낸다.

#
`auxiliary/scanner/ftp/anonymous`

FTP 서버가 익명 접속을 허용하는지 확인

#
`auxiliary/scanner/snmp/snmp_login` 

조직에 1000개의 장치가 있는 경우 매일 하나씩 모든 장치가 제대로 작동하는지 확인하는 것은 바쁜 작업이다. 이를 용이하게 하기 위해 SNMP(Simple Network Management Protocol)가 사용된다. 

SNMP 서버로 접근해 특정 시스템에 대한 상당한 정보를 얻거나 원격 장치를 손상시킬 수 있다. 

snmp_login 모듈을 사용하면 단이 IP 주소나 IP 주소 범위에 대해 단어 목록을 시도해볼 수 있다.

#
`exploit/windows/smb/ms08_067_netapi`

```
set payload windows/shell/reverse_tcp
```
show options를 입력하면 lhost, lport 옵션이 추가된걸 확인할 수 있다.
![image](https://user-images.githubusercontent.com/61821641/154139664-f3f3be69-3ca9-4a55-a29c-e5d8e0aa6c8a.png)

```
show targets
```
