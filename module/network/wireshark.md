# 🦈
![image](https://user-images.githubusercontent.com/61821641/147723542-912d98d1-6ce1-4d85-81d1-bdde0ad70c91.png)
#
`PcapNg에서 pcap으로 변환`
```
editcap -F libpcap <pcapng file> <바꿀 pcap 이름>
```
#
`파일 분할`
- 파일이 너무 커서 분할해야 할때
```
editcap -c 100000 test.pcap test
```
- `test_(번호)`형식으로 분할된 패킷 캡처 파일이 만들어짐
- 100000개 단위로 분할
#
`pcap, PcapNg 파일 복구`
- pcapfix
- 바이너리 에디터로 pcap 파일을 열어 파일 형식을 참조해가며 직접 바이너리에서 에러가 발생하는 부분을 수정
#
`패킷 표시 화면`

![image](https://user-images.githubusercontent.com/61821641/155912486-b9e0efe7-5d06-4b52-9034-874160d39282.png)

1. 패킷목록

![image](https://user-images.githubusercontent.com/61821641/155912537-6b5deff4-e73b-422c-9af6-4e98802c134d.png)

- 패킷의 번호, 시간, 출발지 주소, 목적지 주소, 사용한 프로토콜, 패킷 내용

2. 상세 패킷 내용

![image](https://user-images.githubusercontent.com/61821641/155912661-e3af46be-3afe-456e-aaad-a76cba23c1fc.png)

- 각 패킷을 프로토콜 기반으로 분석해서 각 프로토콜 헤더의 필드 값과 데이터를 볼 수 있음

3. 원시 패킷

![image](https://user-images.githubusercontent.com/61821641/155912774-dee29675-c4b2-478e-93f0-fa29fbc53611.png)

- 초기 상태는 화면의 왼쪽에 16진수 표기로 표시되고 오른쪽에 인쇄가능한 ASCII 코드로 표시해줌
- ASCII코드 부분은 HTTP나 Telnet과 같이 암호화되지 않은 텍스트 기반 프로토콜이라면 읽을 수 있음
#
`Navigation > Statics`

- Conversations

![image](https://user-images.githubusercontent.com/61821641/155915016-a2a1a930-c726-427c-a0d8-29767ac1ad05.png)

- ipv4탭
    - ip주소 목록을 확인할 수 있음
    - Address A, B를 클릭하여 정렬해서 보면 좀 더 쉽게 ip를 찾을 수 있음

![image](https://user-images.githubusercontent.com/61821641/155921028-21f5b59c-6d9c-4424-bf34-81e5b8cc5209.png)

- tcp 탭
    - 일반적으로 사용하지 않는 포트(http인데 80이아님)로 통신해도 와이어샤크는 인식하지 못한다. 이럴 때 tcp 탭에서 어느 ip 주소의 어느 tcp 포트가 통신하는지 확인할 수 있다.
    - Packets로 정렬하면 패킷크기로 정렬되고 트래픽양이 적은지 극단적으로 많은지 쉽게 알 수 있음
- Protocol Hierarchy

![image](https://user-images.githubusercontent.com/61821641/155920741-5d32a1c2-e577-4769-93c8-ae748c9dff65.png)

-
    - 패킷에서 사용된 프로토콜 내용이 표시됨
    - 여기서 암호화되지 않은 프로토콜(http, ftp, smtp, telnet)같은 통신이 포함돼있는지 확인
#
`필터링`

```
[프로토콜명].[프로토콜 필드명] [연산자] [값]
```
- 프로토콜명
    - ip
    - icmp
    - tcp
    - udp
    - http
- 필드
    - ip.addr(ip주소)
    - ip.src(출발지 ip주소)
    - ip.dst(목적지 ip주소)
    - tcp.port(tcp 포트)
    - tcp.sport(tcp 출발지 포트)
    - tcp.dport(tcp 목적지 포트)
    - tcp.flags(tcp 플래그)
    - http.request(http 요청)
    - http.request.method(http 요청 메소드)
    - http.response(http 응답)
    - http.response.code(http 응답 코드)
- 비교 연산자
    - eq(==)
    - ne(!=)
    - gt(>)
    - lt(<)
    - ge(>=)
    - le(<=)
- 논리 연산자
    - and(&&)
    - or(||)
    - not(!)

ex) 133.242.227.80이라는 ip주소에서 tcp 포트 80번을 사용하는 패킷만 표시
```
ip.addr == 133.242.227.80 && tcp.port ==80
```

#
`Follow TCP(UDP) Stream`

![image](https://user-images.githubusercontent.com/61821641/155923228-11def137-0553-4586-95a7-b281a6ea4206.png)

#
`Export`

`필터링한 패킷 저장`

File > Export Specified Packets > Displayed 선택

![image](https://user-images.githubusercontent.com/61821641/155922653-c46ff01b-d7b5-478c-9b8c-c96ebd5d9ed8.png)

`HTTP 패킷에서 추출`

![image](https://user-images.githubusercontent.com/61821641/155923257-47fae365-e2a2-4784-8f18-2adad4f1a9ba.png)

`패킷의 일부를 바이너리 파일로 저장`
- 원하는 패킷을 선택한 후 하단의 패킷 디테일 창에서 마우스 우클릭하여 `Export Packet Bytes`

![image](https://user-images.githubusercontent.com/61821641/155923518-5215a45c-a6d4-4c88-9e93-e42fd2e357ad.png)
#
References
- [Sample Capture](https://wiki.wireshark.org/SampleCaptures)
