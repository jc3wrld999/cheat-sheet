#
![image](https://user-images.githubusercontent.com/61821641/147723470-a088e84b-1838-4c85-b486-c27a9fe7235a.png)
#
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