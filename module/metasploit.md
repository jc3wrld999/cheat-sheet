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
