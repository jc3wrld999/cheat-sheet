nmap

#
`status`

- Open : 서비스가 지정된 포트에서 수신 대기 중임을 나타냅니다.
- Closed : 포트에 액세스할 수 있지만 지정된 포트에서 수신 대기 중인 서비스가 없음을 나타냅니다. 접근 가능하다는 것은 접근 가능하고 방화벽이나 기타 보안 어플라이언스/프로그램에 의해 차단되지 않는다는 의미입니다.
- Filtered : 포트에 접근할 수 없기 때문에 Nmap이 포트가 열려 있는지 닫혀 있는지 결정할 수 없음을 의미합니다. 이 상태는 일반적으로 Nmap이 해당 포트에 도달하지 못하도록 하는 방화벽 때문입니다. Nmap의 패킷이 포트에 도달하지 못하도록 차단될 수 있습니다. 또는 응답이 Nmap의 호스트에 도달하지 못하도록 차단됩니다.
- Unfiltered : 포트에 접근할 수 있지만 Nmap이 포트가 열려 있는지 닫혀 있는지 확인할 수 없음을 의미합니다. 이 상태는 ACK 스캔을 사용할 때 발생 -sA합니다.
- Open|Filtered : 이것은 Nmap이 포트가 열려 있는지 필터링되는지 여부를 결정할 수 없음을 의미합니다.
- Closed|Filtered : 이것은 Nmap이 포트가 닫혀 있는지 또는 필터링되는지 여부를 결정할 수 없음을 의미합니다.

#
`options`
```
-p #지정된 포트만 스캔
-p- #65535개의 모든 포트를 스캔
--open #열려있는 포트만 스캔

-T<num> #빠른 스캔(T<1~5>)
-F #가장 일반적인 100 포트
--top-ports 10 

--min-rate <number>
--max-rate <number> #스캐너가 초당 10개 이상의 패킷을 보내지 않도록
--min-parallelism <numprobes>
--max-parallelism <numprobes>

-v #상세수준을 높임/스캔이 진행됨에 따라 업데이트

-n #DNS 확인을 하지않음
-R #모든 호스트에 대한 역방향 DNS 조회
--dns-servers DNS_SERVER #특정 DNS 서버를 사용

-sn #라이브 시스템을 포트 스캔하지 않고 온라인 호스트를 검색

```
`manual`
```
┌──(root💀kali)-[~]
└─# nmap -help                            
Nmap 7.92 ( https://nmap.org )
Usage: nmap [Scan Type(s)] [Options] {target specification}
TARGET SPECIFICATION:
  Can pass hostnames, IP addresses, networks, etc.
  Ex: scanme.nmap.org, microsoft.com/24, 192.168.0.1; 10.0.0-255.1-254
-iL <입력 파일 이름>: 호스트/네트워크 목록에서 입력
-iR <num hosts>: 랜덤 목표값 선택
--exclude <host1[,host2][,host3],...>: 호스트/네트워크 제외
--excludefile <exclude_file>: 파일에서 목록 제외
호스트 검색:
-sL: List Scan - 검색할 대상을 나열하기만 하면 됩니다.
-sn: Ping 검색 - 포트 검색 사용 안 함
-Pn: 모든 호스트를 온라인으로 처리 - 호스트 검색 건너뛰기
-PS/PA/PU/PY[포트 목록]: 지정된 포트에 대한 TCP SYN/ACK, UDP 또는 SCTP 검색
-PE/PP/PM: ICMP 에코, 타임스탬프 및 넷마스크 요청 검색 프로브
-PO[프로토콜 목록]: IP 프로토콜 핑
-n/-R: DNS 확인 안 함/항상 확인 [기본값: 때때로]
--dns-servers <serv1[,serv2],...>: 사용자 지정 DNS 서버 지정
--system-dns: OS의 DNS 확인기 사용
--traceroute: 각 호스트의 추적 홉 경로
스캔 기법:
-S/sT/sA/sW/sM: TCP SYN/Connect()/ACK/Window/Maimon 스캔
-sU: UDP 스캔
-sN/sF/sX: TCP Null, FIN 및 Xmas 검색
--scanflags <flags>: TCP 검색 플래그 사용자 지정
-sI <좀비 호스트[:probeport]: 유휴 검색
-sY/sZ: SCTP INIT/COOKIE-ECHO 스캔
-sO: IP 프로토콜 검색
-b <FTP 릴레이 호스트>: FTP 바운스 검색
포트 사양 및 스캔 순서:
-p <포트 범위>: 지정된 포트만 검색
Ex: -p22; -p1-65535; -p U:53,111,137,T:21-25,80,139,80,S:9
--exclude-ports <port ranges>: 지정한 포트를 검색에서 제외합니다.
-F: 고속 모드 - 기본 검색보다 적은 수의 포트를 검색합니다.
-r: 연속적으로 포트 검색 - 임의 추출 안 함
--top-ports <number>: 가장 일반적인 포트 <number> 검색
--port-rio <ratio>: <ratio>보다 더 일반적인 포트 검색
서비스/버전 감지:
-sV: 열려 있는 포트를 탐색하여 서비스/버전 정보를 확인합니다.
--version-intensity <level>: 0(라이트)에서 9(모든 프로브 시도)로 설정합니다.
--version-light: 프로브에 대한 제한(강도 2)
--version-all: 모든 프로브를 시도해 보십시오(강도 9).
--version-trace: 디버깅을 위한 상세 버전 검색 활동 표시
스크립트 검색:
-sC: --script=default와 동일합니다.
--script=<Lua 스크립트>: <Lua 스크립트>는 쉼표로 구분된 목록입니다.
디렉토리, 스크립트 파일 또는 스크립트 카테고리
--script-args=<n1=v1,[n2=v2,...]>>: 스크립트에 인수를 제공합니다.
--script-args-file=filename: NSE 스크립트 arg를 파일에 제공합니다.
--script-trace: 보내고 받은 모든 데이터 표시
--script-updatedb: 스크립트 데이터베이스를 업데이트합니다.
--script-help=<Lua 스크립트>: 스크립트에 대한 도움말을 표시합니다.
<Lua 스크립트>는 쉼표로 구분된 스크립트 파일 또는
스크립트 범주.
OS 탐지:
-O: OS 탐지 활성화
--oscan-limit: OS 탐지를 유망한 대상으로 제한
--osscan-guess: OS를 보다 적극적으로 추측
타이밍 및 성능:
<time>이 걸리는 옵션은 초 단위이거나 'ms'(밀리초)를 추가하는 옵션입니다.
's'(초), 'm'(분) 또는 'h'(시간)를 값으로 지정합니다(예: 30m).
-T<0-5>: 타이밍 템플릿 설정(높을수록 빠름)
--min-hostgroup/max-hostgroup <size>: 병렬 호스트 검색 그룹 크기
--min-parallelism/max-paralism <numprobes>: 프로브 병렬화
--min-rtt-timeout/max-rtt-timeout/initial-rtt-timeout <time>: 지정
왕복 시간을 조사하다
--max-retries <tries>: 포트 검색 시도 재전송 횟수를 제한합니다.
--host-timeout <time>: 이렇게 긴 시간이 지난 후 대상을 포기합니다.
--scan-delay/--max-scan-delay <time>: 프로브 간 지연 조정
--min-rate <number>: 초당 <number> 이상의 패킷을 보냅니다.
--max-rate <number>: 초당 <number> 이하의 패킷 전송
방화벽/ID 회피 및 스푸핑:
-f; --mtu <val>: 조각 패킷(선택적으로 MTU가 제공됨)
-D <decoy1,decoy2[,ME],...>: 스캔을 미끼로 덮습니다.
-S <IP_Address>: 스푸핑 소스 주소
-e <iface>: 지정된 인터페이스 사용
-g/--source-port <portnum>: 지정된 포트 번호 사용
--proxies <url1,[url2],...>: HTTP/SOCKS4 프록시를 통한 릴레이 연결
--data <hex string>: 보낸 패킷에 사용자 지정 페이로드 추가
--data-string <string>: 보낸 패킷에 사용자 지정 ASCII 문자열 추가
--data-length <num>: 전송된 패킷에 임의 데이터 추가
--ip-options <options>: 지정된 IP 옵션과 함께 패킷을 보냅니다.
--ttl <val>: IP time-to-live 필드 설정
--spoof-mac <mac address/prefix/vendor name>: MAC 주소를 스푸핑합니다.
--badsum: 가짜 TCP/UDP/SCTP 체크섬을 사용하여 패킷 전송
출력:
-oN/-oX/-oS/-oG <file>: 일반, XML, s|<rIpt kIdi3,
및 Grepable 형식은 각각 지정된 파일 이름에 대해 지정됩니다.
EXAMPLES:
  nmap -v -A scanme.nmap.org
  nmap -v -sn 192.168.0.0/16 10.0.0.0/8
  nmap -v -iR 10000 -Pn -p 80
SEE THE MAN PAGE (https://nmap.org/book/man.html) FOR MORE OPTIONS AND EXAMPLES

```
#
`기본 NSE nmap 스크립트`
```
nmap -sC <TARGETS>
```
![image](https://user-images.githubusercontent.com/61821641/150687489-95d20fb3-de3a-4090-a7e0-88c7fd0d4581.png)
#
`검색할 호스트 목록`
```
nmap -sL <TARGETS>
```

#
`서비스 목록`
```
nmap -sV <TARGETS>
```
![image](https://user-images.githubusercontent.com/61821641/150687603-330ab944-4e77-4ca1-8364-34b3a556a67f.png)
#
`타겟 목록을 파일로 제공`
```
nmap -iL list_of_hosts.txt
```
#
`ARP scan`
```
nmap -PR -sn MACHINE_IP/24
```
![image](https://user-images.githubusercontent.com/61821641/150687811-85cc3fa2-ab76-45ee-a539-39956fe8a99e.png)
`arp-scan`
```
apt install arp-scan
```
```
arp-scan MACHINE_IP/24
arp-scan -l #local network의 모든 유효한 ip주소로 arp 쿼리를 보냄
```
![image](https://user-images.githubusercontent.com/61821641/150688292-d7d64176-a57b-4a18-8a42-e5070f0d3209.png)
#
`ICMP echo scan`
```
nmap -PE -sn MACHINE_IP/24
```
![image](https://user-images.githubusercontent.com/61821641/150687743-7b4f3087-b391-4a7f-ba1f-489e19b3b274.png)
#
`ICMP timestamp scan`
```
nmap -PP -sn MACHINE_IP/24
```
![image](https://user-images.githubusercontent.com/61821641/150687864-a8c4fb33-497a-4009-a018-3daa0cacfa5b.png)
#
`ICMP 주소 마스크 scan`
```
nmap -PM -sn MACHINE_IP/24
```
#
`TCP 연결 scan(열린포트스캔)`
```
nmap -sT <TARGETS>
```
![image](https://user-images.githubusercontent.com/61821641/150690668-a12703dc-fa44-40e5-9482-6d8c02c5d75e.png)
#
`TCP SYN scan`
```
nmap -sS <TARGETS>
```
![image](https://user-images.githubusercontent.com/61821641/150691195-59d9ebec-ec8f-483e-9123-6381df05c563.png)
`TCP SYN ping scan`
```
nmap -PS22,80,443 -sn MACHINE_IP/30
```
![image](https://user-images.githubusercontent.com/61821641/150687953-a857f9d1-570f-42e1-9305-761940536869.png)
#
`TCP ACK ping scan` --권한이 있어야 함
```
nmap -sA <TARGET>
```
![image](https://blog.kakaocdn.net/dn/0ZZMW/btrrqmQ9J3J/am6HHVlKyEcOOjet4OsRz0/img.png)
```
nmap -PA22,80,443 -sn MACHINE_IP/30
```
![image](https://user-images.githubusercontent.com/61821641/150687970-8dc644cf-4ced-42c5-8198-c6bf8fe340b9.png)
#
`UDP scan`
```
nmap -sU <TARGETS>
```
![image](https://blog.kakaocdn.net/dn/tYpV4/btrroNaygO2/caeqs9cqAvezuQZnmCQi5k/img.png)
`UDP ACK ping scan` 
```
nmap -PU22,80,443 -sn MACHINE_IP/30
```
![image](https://user-images.githubusercontent.com/61821641/150687999-da1c2314-0d7c-4493-9c8c-9f47d31d5881.png)
#
`masscan`
```
apt install masscan
```
![image](https://user-images.githubusercontent.com/61821641/150688601-0b679dff-88d6-44fa-84f5-65320c95bc20.png)

#
`Null scan`

![image](https://user-images.githubusercontent.com/61821641/150702308-d80de1e1-8128-401a-b62f-e28571f21f14.png)
![image](https://user-images.githubusercontent.com/61821641/150702335-7f7797ae-1cfb-4831-a5a9-89c1b54ea9c4.png)

null 스캔에서 응답이 없으면 포트가 열려 있거나 방화벽이 패킷을 차단하고 있음
```
nmap -sN <TARGET>
```
![image](https://user-images.githubusercontent.com/61821641/150702325-1dfc82dc-647b-48f9-977e-0811554d99a6.png)

#
`Fin scan`

열려있으면 응답하지않음

![image](https://user-images.githubusercontent.com/61821641/150702355-c005fa7f-5bd1-4cde-9c78-a03d7930f8cd.png)

tcp가 닫혀있을 경우 RST 응답을 받음

![image](https://user-images.githubusercontent.com/61821641/150702372-dffad043-eeae-471f-9c5a-8416a0d12415.png)
```
nmap -sF <TARGET>
```
![image](https://user-images.githubusercontent.com/61821641/150702383-daa48305-c97c-44be-8692-1b072184fa3f.png)

#
`Xmas scan`

![image](https://user-images.githubusercontent.com/61821641/150702404-25a3f218-3248-4f9e-8ab1-60f43d659131.png)
![image](https://user-images.githubusercontent.com/61821641/150702414-0a0b8572-1779-4de1-8a32-b24d83e9b374.png)
```
nmap -sX <TARGET>
```
![image](https://user-images.githubusercontent.com/61821641/150702424-daee3b59-cda7-489f-9968-eeb3133acda6.png)

#
`Maimon`

포트가 열려 있는지 여부에 관계없이 RST 패킷으로 응답

![image](https://user-images.githubusercontent.com/61821641/150702444-cef07dc8-bfb8-42e0-a6d5-fb22831c25c3.png)
```
nmap -sM <TARGET>
```
![image](https://user-images.githubusercontent.com/61821641/150702462-dea483b2-893b-4da6-a99e-bafcfe701e8b.png)

#
`Window scan`

![image](https://user-images.githubusercontent.com/61821641/150702496-9f194573-914b-48d8-af2a-829d064573ae.png)
```
nmap -sW <TARGET>
```
![image](https://user-images.githubusercontent.com/61821641/150702524-12f34480-ce41-4b3f-b848-4c69b735b665.png)
#
`custom scan`

```
--scanflags 
--scanflags RSTSYNFIN # RST, SYN, FIN flag
```
#
`Spoofing`

1. 공격자는 스푸핑된 소스 IP 주소가 포함된 패킷을 대상 시스템에 보냅니다.
2. 대상 시스템은 스푸핑된 IP 주소에 대상으로 응답합니다.
3. 공격자는 응답을 캡처하여 열린 포트를 파악합니다.
```
nmap -S <SPOOFED_IP> <TARGET>
```


