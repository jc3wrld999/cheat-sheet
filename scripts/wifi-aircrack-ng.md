aircrack-ng
#
`제품군`
-   aircrack-ng
-   airdecap-ng
-   airmon-ng
-   aireplay-ng
-   airodump-ng
-   airtun-ng
-   packetforge-ng
-   airbase-ng
-   airdecloak-ng
-   airolib-ng
-   airserv-ng
-   buddy-ng
-   ivstools
-   easside-ng
-   tkiptun-ng
-   wesside-ng

`핵심 용어`

- SSID: 시도하고 연결할 때 표시되는 네트워크 "이름"
    - ESSID: 더 큰 네트워크를 형성하는 회사 사무실과 같은 여러 액세스 포인트에 적용될 수 있는 SSID. Aircrack의 경우 일반적으로 공격하는 네트워크를 나타냄
- BSSID: 액세스 포인트 MAC(하드웨어) 주소
- WPA2: 클라이언트는 4 way handshake로 AP와 서로 말하지 않고 인증하며 최소 비밀번호 길이는 8이다.
    - WPA2-PSK: 모든 사람에게 동일한 암호를 제공하여 연결하는 Wi-Fi 네트워크
    - WPA2-EAP: RADIUS 서버로 전송되는 사용자 이름과 암호를 제공하여 인증하는 Wi-Fi 네트워크
- RADIUS: Wi-Fi 뿐만 아니라 클라이언트 인증을 위한 서버

#
`monitor mode로 시작`

```
airmon-ng start <name>
```

다른 프로세스가 해당 네트워크 어댑터를 사용하려고 할 때
```
airmon-ng check kill
```
#
`패킷 캡쳐`

```
airodump-ng <interface>
```
options
```
--bssid <bssid> #모니터링할 BSSID를 설정
--channel <channel> #모니터링할 channel을 설정
-w <file name> #패킷을 파일로 캡쳐
```
#
`캡쳐한 패킷 크랙`
```
aircrack-ng -b <bssid> -w /usr/share/wordlists/rockyou.txt <caputre file>
```
![image](https://user-images.githubusercontent.com/61821641/150635903-c85ada58-910a-4946-83cf-3c94bc2cf62f.png)
#
reference
- [aircrack](https://www.aircrack-ng.org/doku.php?id=newbie_guide)