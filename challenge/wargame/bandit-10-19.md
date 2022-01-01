bandit 10-19
#
level 10 > 11 : base64 decoding
```
bandit10@bandit:~$ cat data.txt
VGhlIHBhc3N3b3JkIGlzIElGdWt3S0dzRlc4TU9xM0lSRnFyeEUxaHhUTkViVVBSCg==

bandit10@bandit:~$ echo VGhlIHBhc3N3b3JkIGlzIElGdWt3S0dzRlc4TU9xM0lSRnFyeEUxaHhUTkViVVBSCg== | base64 --decode
The password is IFukwKGsFW8MOq3IRFqrxE1hxTNEbUPR
```
level 11 > 12 : rot13
```
bandit11@bandit:~$ cat data.txt
Gur cnffjbeq vf 5Gr8L4qetPEsPk8htqjhRK8XSP6x2RHh
bandit11@bandit:~$ cat data.txt | tr 'A-Za-z' 'N-ZA-Mn-za-m'
The password is 5Te8Y4drgCRfCx8ugdwuEX8KFC6k2EUu
```
level 12 > 13 :
1. 16진수 덤프파일 > xxd 명령에 r 옵션으로 16진수 덤프파일을 이진파일로 바꿔준다.
```
bandit12@bandit:~$ mkdir /tmp/gzip
bandit12@bandit:~$ cp data.txt /tmp/gzip
bandit12@bandit:~$ cd /tmp/gzip
bandit12@bandit:/tmp/gzip$ xxd -r data.txt > bandit
```
2. file 명령어로 파일 타입을 확인 > data2.bin 파일을 gzip으로 압축된 파일이라는 걸 알 수 있음
```
bandit12@bandit:/tmp/gzip$ ls
bandit  data.txt
bandit12@bandit:/tmp/gzip$ file bandit
bandit: gzip compressed data, was "data2.bin", last modified: Thu May  7 18:14:30 2020, max compression, from Unix
```
3. mv 명령어로 확장자를 변경
```
bandit12@bandit:/tmp/gzip$ mv bandit data2.bin.gz
bandit12@bandit:/tmp/gzip$ ls
data2.bin.gz  data.txt
```
4. gunzip으로 압축풀기 > 압축해제된 파일은 bzip2로 압축된 파일이다.
```
bandit12@bandit:/tmp/gzip$ gunzip data2.bin.gz
bandit12@bandit:/tmp/gzip$ ls
data2.bin  data.txt
bandit12@bandit:/tmp/gzip$ file data2.bin
data2.bin: bzip2 compressed data, block size = 900k
```
5. 압축 풀고 확장자 바꾸고 압축 풀고 확장자 바꾸고..
```
bandit12@bandit:/tmp/gzip$ mv data2.bin data3.bin.bz2
bandit12@bandit:/tmp/gzip$ bunzip2 data3.bin.bz2
bandit12@bandit:/tmp/gzip$ file data3.bin
data3.bin: gzip compressed data, was "data4.bin", last modified: Thu May  7 18:14:30 2020, max compression, from Unix
bandit12@bandit:/tmp/gzip$ mv data3.bin data4.bin.gz
bandit12@bandit:/tmp/gzip$ gunzip data4.bin.gz
bandit12@bandit:/tmp/gzip$ file data4.bin
data4.bin: POSIX tar archive (GNU)
bandit12@bandit:/tmp/gzip$ mv data4.bin data5.bin.tar
bandit12@bandit:/tmp/gzip$ tar -xvf data5.bin.tar
data5.bin
bandit12@bandit:/tmp/gzip$ file data5.bin
data5.bin: POSIX tar archive (GNU)
bandit12@bandit:/tmp/gzip$ mv data5.bin data6.bin.tar
bandit12@bandit:/tmp/gzip$ tar -xvf data6.bin.tar
data6.bin
bandit12@bandit:/tmp/gzip$ file data6.bin
data6.bin: bzip2 compressed data, block size = 900k
bandit12@bandit:/tmp/gzip$ mv data6.bin data7.bin.bz2
bandit12@bandit:/tmp/gzip$ bunzip2 data7.bin.bz2
bandit12@bandit:/tmp/gzip$ file data7.bin
data7.bin: POSIX tar archive (GNU)
bandit12@bandit:/tmp/gzip$ mv data7.bin data8.bin.tar
bandit12@bandit:/tmp/gzip$ tar -xvf data8.bin.tar
data8.bin
bandit12@bandit:/tmp/gzip$ file data8.bin
data8.bin: gzip compressed data, was "data9.bin", last modified: Thu May  7 18:14:30 2020, max compression, from Unix
bandit12@bandit:/tmp/gzip$ mv data8.bin data9.bin.gz
bandit12@bandit:/tmp/gzip$ gunzip data9.bin.zip
gzip: data9.bin.zip.gz: No such file or directory
bandit12@bandit:/tmp/gzip$ gunzip data9.bin.gz
bandit12@bandit:/tmp/gzip$ file data9.bin
data9.bin: ASCII text
bandit12@bandit:/tmp/gzip$ cat data9.bin
The password is 8ZjyCRiBWFYkneahHwxCv3wb2a1ORpYL
```
level 13 > 14 : ssh key
```
bandit13@bandit:~$ ssh -i sshkey.private bandit14@localhost

bandit14@bandit:~$ cd /etc/bandit_pass
bandit14@bandit:/etc/bandit_pass$ cat bandit14
4wcYUJFw0k0XLShlDzztnTBHiqxU3b3e
```
level 14 > 15 :  현재 레벨의 비밀번호 를 localhost 의 포트 30000에 제출하여 검색
```
bandit14@bandit:~$ echo 4wcYUJFw0k0XLShlDzztnTBHiqxU3b3e | nc localhost 30000
Correct!
BfMYroe26WYalil77FoDi9qh59eK5xNr
```
level 15 > 16 : [openssl](https://www.lesstif.com/software-architect/openssl-command-tip-7635159.html) 
```
bandit15@bandit:~$ openssl s_client -connect localhost:30001
CONNECTED(00000003)
depth=0 CN = localhost
verify error:num=18:self signed certificate
verify return:1
depth=0 CN = localhost
verify return:1
---
Certificate chain
 0 s:/CN=localhost
   i:/CN=localhost
---
Server certificate
-----BEGIN CERTIFICATE-----
MIICBjCCAW+gAwIBAgIEZOzuVDANBgkqhkiG9w0BAQUFADAUMRIwEAYDVQQDDAls
b2NhbGhvc3QwHhcNMjEwOTMwMDQ0NTU0WhcNMjIwOTMwMDQ0NTU0WjAUMRIwEAYD
VQQDDAlsb2NhbGhvc3QwgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAM9En7CC
uPr6cVPATLAVhWMU1hggfIJEp5sZN9RPUbK0zKBv802yD54ObHYmIge6lqqkgXOz
2AuI4UfCG4iMb0UYUCA/wISwNqUQrjcja0OnqzCTRscXzzoIsHbC8lGFzMDRz3Jw
8nBD6/2jvFt1rnBtZ4ghibNn5rFHRi5EC+K/AgMBAAGjZTBjMBQGA1UdEQQNMAuC
CWxvY2FsaG9zdDBLBglghkgBhvhCAQ0EPhY8QXV0b21hdGljYWxseSBnZW5lcmF0
ZWQgYnkgTmNhdC4gU2VlIGh0dHBzOi8vbm1hcC5vcmcvbmNhdC8uMA0GCSqGSIb3
DQEBBQUAA4GBAD7/moj14DUI6/D6imJ8pQlAy/8lZlsrbyRnqpzjWaATShDYr7k3
umdRg+36MciNFAglE7nGYZroTSDCm650D81+797owSXLPAdp1Q6JfQH5LOni2kbw
UHcO9hwQ+rJzEgIlfGOic7dC5lj8DBU5tugY87RZGKiZ2GG77WXas9Iz
-----END CERTIFICATE-----
subject=/CN=localhost
issuer=/CN=localhost
---
No client certificate CA names sent
Peer signing digest: SHA512
Server Temp Key: X25519, 253 bits
---
SSL handshake has read 1019 bytes and written 269 bytes
Verification error: self signed certificate
---
New, TLSv1.2, Cipher is ECDHE-RSA-AES256-GCM-SHA384
Server public key is 1024 bit
Secure Renegotiation IS supported
Compression: NONE
Expansion: NONE
No ALPN negotiated
SSL-Session:
    Protocol  : TLSv1.2
    Cipher    : ECDHE-RSA-AES256-GCM-SHA384
    Session-ID: 05D41558020A33C1B84812A69A4653621C1F4C42FD6AAECF6BC6BF3B969E99C5
    Session-ID-ctx: 
    Master-Key: 69B58566235AA200F56ED62DF421669814C56346395D6E69A69F5E4858A2B39E877889BC21ACC3E71D3F7DCB5C5A4C15
    PSK identity: None
    PSK identity hint: None
    SRP username: None
    TLS session ticket lifetime hint: 7200 (seconds)
    TLS session ticket:
    0000 - 8a eb e8 f5 31 15 46 ad-b2 a8 10 c1 51 b9 66 14   ....1.F.....Q.f.
    0010 - f0 a7 4d 2b 3e 40 57 4b-3f 99 6f 4a b6 fb ab 3b   ..M+>@WK?.oJ...;
    0020 - 46 65 5c 61 59 67 e1 56-35 13 d9 df e1 0a f7 1e   Fe\aYg.V5.......
    0030 - 04 70 87 40 ad 90 eb 85-c7 95 e7 4e 62 1d fe 6e   .p.@.......Nb..n
    0040 - 28 0c 22 1c a8 4a 9a 1c-7d 61 ab 21 2b 1b f6 ea   (."..J..}a.!+...
    0050 - 13 4c c3 ee 35 82 4f ed-ea 8c e9 cc 03 62 98 65   .L..5.O......b.e
    0060 - 32 4f b9 07 05 21 4e e8-4b 77 67 88 8d dd 38 a1   2O...!N.Kwg...8.
    0070 - e1 d6 2c 89 26 e1 fd 88-3e 68 b6 a0 fb 51 ce 8d   ..,.&...>h...Q..
    0080 - 2c 12 15 d5 e4 f8 3b 72-54 ea 8c 13 74 d9 83 0c   ,.....;rT...t...
    0090 - ce 8a 4c 04 05 20 02 03-49 a1 6e 68 00 b5 ea 88   ..L.. ..I.nh....

    Start Time: 1641001982
    Timeout   : 7200 (sec)
    Verify return code: 18 (self signed certificate)
    Extended master secret: yes
---
BfMYroe26WYalil77FoDi9qh59eK5xNr
Correct!
cluFn7wTiGryunymYOu4RcffSxQluehd

closed
```
level 16 > 17 : [openssl heartbleed 취약점 활용](https://blog.alyac.co.kr/76)

1. nmap 스캔 > openssl 포트 찾음 (31790)
```
bandit16@bandit:~$ nmap -sT -sV -p 31000-32000 localhost

Starting Nmap 7.40 ( https://nmap.org ) at 2022-01-01 03:00 CET
Nmap scan report for localhost (127.0.0.1)
Host is up (0.00025s latency).
Not shown: 996 closed ports
PORT      STATE SERVICE     VERSION
31046/tcp open  echo
31518/tcp open  ssl/echo
31691/tcp open  echo
31790/tcp open  ssl/unknown
31960/tcp open  echo
1 service unrecognized despite returning data. If you know the service/version, please submit the following fingerprint at https://nmap.org/cgi-bin/submit.cgi?new-service :
SF-Port31790-TCP:V=7.40%T=SSL%I=7%D=1/1%Time=61CFB5B3%P=x86_64-pc-linux-gn
SF:u%r(GenericLines,31,"Wrong!\x20Please\x20enter\x20the\x20correct\x20cur
SF:rent\x20password\n")%r(GetRequest,31,"Wrong!\x20Please\x20enter\x20the\
SF:x20correct\x20current\x20password\n")%r(HTTPOptions,31,"Wrong!\x20Pleas
SF:e\x20enter\x20the\x20correct\x20current\x20password\n")%r(RTSPRequest,3
SF:1,"Wrong!\x20Please\x20enter\x20the\x20correct\x20current\x20password\n
SF:")%r(Help,31,"Wrong!\x20Please\x20enter\x20the\x20correct\x20current\x2
SF:0password\n")%r(SSLSessionReq,31,"Wrong!\x20Please\x20enter\x20the\x20c
SF:orrect\x20current\x20password\n")%r(TLSSessionReq,31,"Wrong!\x20Please\
SF:x20enter\x20the\x20correct\x20current\x20password\n")%r(Kerberos,31,"Wr
SF:ong!\x20Please\x20enter\x20the\x20correct\x20current\x20password\n")%r(
SF:FourOhFourRequest,31,"Wrong!\x20Please\x20enter\x20the\x20correct\x20cu
SF:rrent\x20password\n")%r(LPDString,31,"Wrong!\x20Please\x20enter\x20the\
SF:x20correct\x20current\x20password\n")%r(LDAPSearchReq,31,"Wrong!\x20Ple
SF:ase\x20enter\x20the\x20correct\x20current\x20password\n")%r(SIPOptions,
SF:31,"Wrong!\x20Please\x20enter\x20the\x20correct\x20current\x20password\
SF:n");

Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 88.90 seconds
```
2. 31790 포트로 연결 > RSA key 찾음
```
bandit16@bandit:~$ openssl s_client -connect localhost:31790
CONNECTED(00000003)                                                                                                                                          
depth=0 CN = localhost                                                                                                                                       
verify error:num=18:self signed certificate                                                                                                                  
verify return:1                                                                                                                                              
depth=0 CN = localhost                                                                                                                                       
verify return:1                                                                                                                                              
---                                                                                                                                                          
Certificate chain                                                                                                                                            
 0 s:/CN=localhost                                                                                                                                           
   i:/CN=localhost                                                                                                                                           
---                                                                                                                                                          
Server certificate                                                                                                                                           
-----BEGIN CERTIFICATE-----                                                                                                                                  
MIICBjCCAW+gAwIBAgIERp0H3zANBgkqhkiG9w0BAQUFADAUMRIwEAYDVQQDDAls                                                                                             
b2NhbGhvc3QwHhcNMjExMjA1MTkxNjIwWhcNMjIxMjA1MTkxNjIwWjAUMRIwEAYD                                                                                             
VQQDDAlsb2NhbGhvc3QwgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBANKk71YL                                                                                             
CHrcxjGkDZ52qTgeK3UsA5fQMfY+QrvJfGyvybJ2aWEOLv44Tz/V6XQ3K9WWltMR                                                                                             
v1e7+y9RWje/CmgJ/eeYUoAslcbHW5M3AOyoolDyazod4ddFkQdcLU4DzD0AAVb5                                                                                             
OsQ9FriQCtSjmdv/DXDB1oi8Di9dEs5vpeOzAgMBAAGjZTBjMBQGA1UdEQQNMAuC                                                                                             
CWxvY2FsaG9zdDBLBglghkgBhvhCAQ0EPhY8QXV0b21hdGljYWxseSBnZW5lcmF0                                                                                             
ZWQgYnkgTmNhdC4gU2VlIGh0dHBzOi8vbm1hcC5vcmcvbmNhdC8uMA0GCSqGSIb3                                                                                             
DQEBBQUAA4GBAH/R4xbuO92i9pVbZ9A82wNkDZ6yz0wY+h5ft7Z2rWhV8bc6jriA                                                                                             
wlLToiVB5zB7SEflrcUXI4y8A4pXocxn26wpGoITRFCiNZJecBPsgkjSqBwJ5RMB
zCQ4OTg/oPgIBSNxYZcasR4/0cks+haWBDV9V/Y0OxeU1OKCKzcWtKvI
-----END CERTIFICATE-----
subject=/CN=localhost
issuer=/CN=localhost
---
No client certificate CA names sent
Peer signing digest: SHA512
Server Temp Key: X25519, 253 bits
---
SSL handshake has read 1019 bytes and written 269 bytes
Verification error: self signed certificate
---
New, TLSv1.2, Cipher is ECDHE-RSA-AES256-GCM-SHA384
Server public key is 1024 bit
Secure Renegotiation IS supported
Compression: NONE
Expansion: NONE
No ALPN negotiated
SSL-Session:
    Protocol  : TLSv1.2
    Cipher    : ECDHE-RSA-AES256-GCM-SHA384
    Session-ID: 0683527BF5F8D3A44716864A55CB6BD2ED69B1A29C888BCEC643AD9BE54F733C
    Session-ID-ctx: 
    Master-Key: 9AAF6A8EDAB76F3AB1366E14F3280F783EEE563F1D87C336F13C4876BB60D1B3ED030C1325A6C0810249B5AEF80C34E8
    PSK identity: None
    PSK identity hint: None
    SRP username: None
    TLS session ticket lifetime hint: 7200 (seconds)
    TLS session ticket:
    0000 - a9 7b f8 63 21 5b c5 4e-f5 18 97 8e 5e d5 c7 43   .{.c![.N....^..C
    0010 - a9 f5 a2 c3 14 eb d0 1f-95 02 f2 4a 14 2e 10 04   ...........J....
    0020 - 0d cf c3 71 3f 9f e7 b5-14 3f 09 89 76 e8 12 7e   ...q?....?..v..~
    0030 - 48 4e 99 12 ee 00 19 b5-92 67 87 fc f3 8f 93 29   HN.......g.....)
    0040 - cd cc 7d 36 79 5c c0 f0-d2 e6 cb d0 34 7a 95 82   ..}6y\......4z..
    0050 - 6b a0 41 65 0f ed 79 81-86 b9 be 19 4a 99 6e f9   k.Ae..y.....J.n.
    0060 - 0f 86 1b 53 29 d6 33 cf-59 88 7b c6 b7 8a a6 7c   ...S).3.Y.{....|
    0070 - bc fa a4 83 df 2a f6 9b-b6 39 27 78 97 3d ef bd   .....*...9'x.=..
    0080 - 6e 60 b9 0f 5f 08 01 d3-81 12 21 43 49 fc f5 4a   n`.._.....!CI..J
    0090 - 71 95 74 5a 41 cc 57 2b-b4 5d 36 cf 58 72 df 62   q.tZA.W+.]6.Xr.b

    Start Time: 1641002856
    Timeout   : 7200 (sec)
    Verify return code: 18 (self signed certificate)
    Extended master secret: yes
---
cluFn7wTiGryunymYOu4RcffSxQluehd
Correct!
-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAvmOkuifmMg6HL2YPIOjon6iWfbp7c3jx34YkYWqUH57SUdyJ
imZzeyGC0gtZPGujUSxiJSWI/oTqexh+cAMTSMlOJf7+BrJObArnxd9Y7YT2bRPQ
Ja6Lzb558YW3FZl87ORiO+rW4LCDCNd2lUvLE/GL2GWyuKN0K5iCd5TbtJzEkQTu
DSt2mcNn4rhAL+JFr56o4T6z8WWAW18BR6yGrMq7Q/kALHYW3OekePQAzL0VUYbW
JGTi65CxbCnzc/w4+mqQyvmzpWtMAzJTzAzQxNbkR2MBGySxDLrjg0LWN6sK7wNX
x0YVztz/zbIkPjfkU1jHS+9EbVNj+D1XFOJuaQIDAQABAoIBABagpxpM1aoLWfvD
KHcj10nqcoBc4oE11aFYQwik7xfW+24pRNuDE6SFthOar69jp5RlLwD1NhPx3iBl
J9nOM8OJ0VToum43UOS8YxF8WwhXriYGnc1sskbwpXOUDc9uX4+UESzH22P29ovd
d8WErY0gPxun8pbJLmxkAtWNhpMvfe0050vk9TL5wqbu9AlbssgTcCXkMQnPw9nC
YNN6DDP2lbcBrvgT9YCNL6C+ZKufD52yOQ9qOkwFTEQpjtF4uNtJom+asvlpmS8A
vLY9r60wYSvmZhNqBUrj7lyCtXMIu1kkd4w7F77k+DjHoAXyxcUp1DGL51sOmama
+TOWWgECgYEA8JtPxP0GRJ+IQkX262jM3dEIkza8ky5moIwUqYdsx0NxHgRRhORT
8c8hAuRBb2G82so8vUHk/fur85OEfc9TncnCY2crpoqsghifKLxrLgtT+qDpfZnx
SatLdt8GfQ85yA7hnWWJ2MxF3NaeSDm75Lsm+tBbAiyc9P2jGRNtMSkCgYEAypHd
HCctNi/FwjulhttFx/rHYKhLidZDFYeiE/v45bN4yFm8x7R/b0iE7KaszX+Exdvt
SghaTdcG0Knyw1bpJVyusavPzpaJMjdJ6tcFhVAbAjm7enCIvGCSx+X3l5SiWg0A
R57hJglezIiVjv3aGwHwvlZvtszK6zV6oXFAu0ECgYAbjo46T4hyP5tJi93V5HDi
Ttiek7xRVxUl+iU7rWkGAXFpMLFteQEsRr7PJ/lemmEY5eTDAFMLy9FL2m9oQWCg
R8VdwSk8r9FGLS+9aKcV5PI/WEKlwgXinB3OhYimtiG2Cg5JCqIZFHxD6MjEGOiu
L8ktHMPvodBwNsSBULpG0QKBgBAplTfC1HOnWiMGOU3KPwYWt0O6CdTkmJOmL8Ni
blh9elyZ9FsGxsgtRBXRsqXuz7wtsQAgLHxbdLq/ZJQ7YfzOKU4ZxEnabvXnvWkU
YOdjHdSOoKvDQNWu6ucyLRAWFuISeXw9a/9p7ftpxm0TSgyvmfLF2MIAEwyzRqaM
77pBAoGAMmjmIJdjp+Ez8duyn3ieo36yrttF5NSsJLAbxFpdlc1gvtGCWW+9Cq0b
dxviW8+TFVEBl1O4f7HVm6EpTscdDxU+bCXWkfjuRb7Dy9GOtt9JPsX8MBTakzh3
vBgsyi/sN3RqRBcGU40fOoZyfAMT8s1m/uYv52O6IgeuZ/ujbjY=
-----END RSA PRIVATE KEY-----

closed

```
3. sshkey를 저장하고 권한 부여
```
bandit16@bandit:~$ mkdir /tmp/.ssh
bandit16@bandit:~$ cd /tmp/.ssh
bandit16@bandit:/tmp/.ssh$ cat > sshkey.private
-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAvmOkuifmMg6HL2YPIOjon6iWfbp7c3jx34YkYWqUH57SUdyJ
imZzeyGC0gtZPGujUSxiJSWI/oTqexh+cAMTSMlOJf7+BrJObArnxd9Y7YT2bRPQ
Ja6Lzb558YW3FZl87ORiO+rW4LCDCNd2lUvLE/GL2GWyuKN0K5iCd5TbtJzEkQTu
DSt2mcNn4rhAL+JFr56o4T6z8WWAW18BR6yGrMq7Q/kALHYW3OekePQAzL0VUYbW
JGTi65CxbCnzc/w4+mqQyvmzpWtMAzJTzAzQxNbkR2MBGySxDLrjg0LWN6sK7wNX
x0YVztz/zbIkPjfkU1jHS+9EbVNj+D1XFOJuaQIDAQABAoIBABagpxpM1aoLWfvD
KHcj10nqcoBc4oE11aFYQwik7xfW+24pRNuDE6SFthOar69jp5RlLwD1NhPx3iBl
J9nOM8OJ0VToum43UOS8YxF8WwhXriYGnc1sskbwpXOUDc9uX4+UESzH22P29ovd
d8WErY0gPxun8pbJLmxkAtWNhpMvfe0050vk9TL5wqbu9AlbssgTcCXkMQnPw9nC
YNN6DDP2lbcBrvgT9YCNL6C+ZKufD52yOQ9qOkwFTEQpjtF4uNtJom+asvlpmS8A
vLY9r60wYSvmZhNqBUrj7lyCtXMIu1kkd4w7F77k+DjHoAXyxcUp1DGL51sOmama
+TOWWgECgYEA8JtPxP0GRJ+IQkX262jM3dEIkza8ky5moIwUqYdsx0NxHgRRhORT
8c8hAuRBb2G82so8vUHk/fur85OEfc9TncnCY2crpoqsghifKLxrLgtT+qDpfZnx
SatLdt8GfQ85yA7hnWWJ2MxF3NaeSDm75Lsm+tBbAiyc9P2jGRNtMSkCgYEAypHd
HCctNi/FwjulhttFx/rHYKhLidZDFYeiE/v45bN4yFm8x7R/b0iE7KaszX+Exdvt
SghaTdcG0Knyw1bpJVyusavPzpaJMjdJ6tcFhVAbAjm7enCIvGCSx+X3l5SiWg0A
R57hJglezIiVjv3aGwHwvlZvtszK6zV6oXFAu0ECgYAbjo46T4hyP5tJi93V5HDi
Ttiek7xRVxUl+iU7rWkGAXFpMLFteQEsRr7PJ/lemmEY5eTDAFMLy9FL2m9oQWCg
R8VdwSk8r9FGLS+9aKcV5PI/WEKlwgXinB3OhYimtiG2Cg5JCqIZFHxD6MjEGOiu
L8ktHMPvodBwNsSBULpG0QKBgBAplTfC1HOnWiMGOU3KPwYWt0O6CdTkmJOmL8Ni
blh9elyZ9FsGxsgtRBXRsqXuz7wtsQAgLHxbdLq/ZJQ7YfzOKU4ZxEnabvXnvWkU
YOdjHdSOoKvDQNWu6ucyLRAWFuISeXw9a/9p7ftpxm0TSgyvmfLF2MIAEwyzRqaM
77pBAoGAMmjmIJdjp+Ez8duyn3ieo36yrttF5NSsJLAbxFpdlc1gvtGCWW+9Cq0b
dxviW8+TFVEBl1O4f7HVm6EpTscdDxU+bCXWkfjuRb7Dy9GOtt9JPsX8MBTakzh3
vBgsyi/sN3RqRBcGU40fOoZyfAMT8s1m/uYv52O6IgeuZ/ujbjY=
-----END RSA PRIVATE KEY-----
^C
bandit16@bandit:/tmp/.ssh$ chmod 600 sshkey.private
```
4. ssh 연결
```
bandit16@bandit:/tmp/.ssh$ ssh -i sshkey.private bandit17@localhost
Could not create directory '/home/bandit16/.ssh'.
The authenticity of host 'localhost (127.0.0.1)' can't be established.
ECDSA key fingerprint is SHA256:98UL0ZWr85496EtCRkKlo20X3OPnyPSB5tB5RPbhczc.
Are you sure you want to continue connecting (yes/no)? yes
Failed to add the host to the list of known hosts (/home/bandit16/.ssh/known_hosts).
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

Linux bandit.otw.local 5.4.8 x86_64 GNU/Linux

      ,----..            ,----,          .---.
     /   /   \         ,/   .`|         /. ./|
    /   .     :      ,`   .'  :     .--'.  ' ;
   .   /   ;.  \   ;    ;     /    /__./ \ : |
  .   ;   /  ` ; .'___,/    ,' .--'.  '   \' .
  ;   |  ; \ ; | |    :     | /___/ \ |    ' '
  |   :  | ; | ' ;    |.';  ; ;   \  \;      :
  .   |  ' ' ' : `----'  |  |  \   ;  `      |
  '   ;  \; /  |     '   :  ;   .   \    .\  ;
   \   \  ',  /      |   |  '    \   \   ' \ |
    ;   :    /       '   :  |     :   '  |--"
     \   \ .'        ;   |.'       \   \ ;
  www. `---` ver     '---' he       '---" ire.org


Welcome to OverTheWire!

If you find any problems, please report them to Steven or morla on
irc.overthewire.org.

--[ Playing the games ]--

  This machine might hold several wargames.
  If you are playing "somegame", then:

    * USERNAMES are somegame0, somegame1, ...
    * Most LEVELS are stored in /somegame/.
    * PASSWORDS for each level are stored in /etc/somegame_pass/.

  Write-access to homedirectories is disabled. It is advised to create a
  working directory with a hard-to-guess name in /tmp/.  You can use the
  command "mktemp -d" in order to generate a random and hard to guess
  directory in /tmp/.  Read-access to both /tmp/ and /proc/ is disabled
  so that users can not snoop on eachother. Files and directories with
  easily guessable or short names will be periodically deleted!

  Please play nice:

    * don't leave orphan processes running
    * don't leave exploit-files laying around
    * don't annoy other players
    * don't post passwords or spoilers
    * again, DONT POST SPOILERS!
      This includes writeups of your solution on your blog or website!

--[ Tips ]--

  This machine has a 64bit processor and many security-features enabled
  by default, although ASLR has been switched off.  The following
  compiler flags might be interesting:

    -m32                    compile for 32bit
    -fno-stack-protector    disable ProPolice
    -Wl,-z,norelro          disable relro

  In addition, the execstack tool can be used to flag the stack as
  executable on ELF binaries.

  Finally, network-access is limited for most levels by a local
  firewall.

--[ Tools ]--

 For your convenience we have installed a few usefull tools which you can find
 in the following locations:

    * gef (https://github.com/hugsy/gef) in /usr/local/gef/
    * pwndbg (https://github.com/pwndbg/pwndbg) in /usr/local/pwndbg/
    * peda (https://github.com/longld/peda.git) in /usr/local/peda/
    * gdbinit (https://github.com/gdbinit/Gdbinit) in /usr/local/gdbinit/
    * pwntools (https://github.com/Gallopsled/pwntools)
    * radare2 (http://www.radare.org/)
    * checksec.sh (http://www.trapkit.de/tools/checksec.html) in /usr/local/bin/checksec.sh

--[ More information ]--

  For more information regarding individual wargames, visit
  http://www.overthewire.org/wargames/

  For support, questions or comments, contact us through IRC on
  irc.overthewire.org #wargames.

  Enjoy your stay!

bandit17@bandit:~$ find /etc -name *bandit17* 2>/dev/null
/etc/rc2.d/K01bandit17.sh
/etc/rc1.d/K01bandit17.sh
/etc/init.d/bandit17.sh
/etc/rc5.d/K01bandit17.sh
/etc/bandit_pass/bandit17
/etc/inetd.d/bandit17.inetd.conf
/etc/rc4.d/K01bandit17.sh
/etc/rc3.d/K01bandit17.sh
/etc/cron.d/cronjob_bandit17_root
bandit17@bandit:~$ cd /etc/bandit_pass
bandit17@bandit:/etc/bandit_pass$ cat bandit17
xLYVMN9WE5zQ5vHacb0sZEVqbrp7nBTn
```
level 17 > 18 : 
old_pw랑 new_pw 비교해서 ssh로그인(ByeBye 가 뜨면 성공)
```
bandit17@bandit:~$ diff passwords.old passwords.new
42c42
< w0Yfolrc5bwjS4qw5mq1nnQi6mF03bii
---
> kfBf3eYk5BPBRzwjqutbbfE887SVc5Yd
bandit17@bandit:~$ ssh bandit18@localhost
The authenticity of host 'localhost (127.0.0.1)' can't be established.
ECDSA key fingerprint is SHA256:98UL0ZWr85496EtCRkKlo20X3OPnyPSB5tB5RPbhczc.
Are you sure you want to continue connecting (yes/no)? yes
Failed to add the host to the list of known hosts (/home/bandit17/.ssh/known_hosts).
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@         WARNING: UNPROTECTED PRIVATE KEY FILE!          @
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
Permissions 0640 for '/home/bandit17/.ssh/id_rsa' are too open.
It is required that your private key files are NOT accessible by others.
This private key will be ignored.
Load key "/home/bandit17/.ssh/id_rsa": bad permissions
bandit18@localhost's password: 
Linux bandit.otw.local 5.4.8 x86_64 GNU/Linux

      ,----..            ,----,          .---.
     /   /   \         ,/   .`|         /. ./|
    /   .     :      ,`   .'  :     .--'.  ' ;
   .   /   ;.  \   ;    ;     /    /__./ \ : |
  .   ;   /  ` ; .'___,/    ,' .--'.  '   \' .
  ;   |  ; \ ; | |    :     | /___/ \ |    ' '
  |   :  | ; | ' ;    |.';  ; ;   \  \;      :
  .   |  ' ' ' : `----'  |  |  \   ;  `      |
  '   ;  \; /  |     '   :  ;   .   \    .\  ;
   \   \  ',  /      |   |  '    \   \   ' \ |
    ;   :    /       '   :  |     :   '  |--"
     \   \ .'        ;   |.'       \   \ ;
  www. `---` ver     '---' he       '---" ire.org


Welcome to OverTheWire!

If you find any problems, please report them to Steven or morla on
irc.overthewire.org.

--[ Playing the games ]--

  This machine might hold several wargames.
  If you are playing "somegame", then:

    * USERNAMES are somegame0, somegame1, ...
    * Most LEVELS are stored in /somegame/.
    * PASSWORDS for each level are stored in /etc/somegame_pass/.

  Write-access to homedirectories is disabled. It is advised to create a
  working directory with a hard-to-guess name in /tmp/.  You can use the
  command "mktemp -d" in order to generate a random and hard to guess
  directory in /tmp/.  Read-access to both /tmp/ and /proc/ is disabled
  so that users can not snoop on eachother. Files and directories with
  easily guessable or short names will be periodically deleted!

  Please play nice:

    * don't leave orphan processes running
    * don't leave exploit-files laying around
    * don't annoy other players
    * don't post passwords or spoilers
    * again, DONT POST SPOILERS!
      This includes writeups of your solution on your blog or website!

--[ Tips ]--

  This machine has a 64bit processor and many security-features enabled
  by default, although ASLR has been switched off.  The following
  compiler flags might be interesting:

    -m32                    compile for 32bit
    -fno-stack-protector    disable ProPolice
    -Wl,-z,norelro          disable relro

  In addition, the execstack tool can be used to flag the stack as
  executable on ELF binaries.

  Finally, network-access is limited for most levels by a local
  firewall.

--[ Tools ]--

 For your convenience we have installed a few usefull tools which you can find
 in the following locations:

    * gef (https://github.com/hugsy/gef) in /usr/local/gef/
    * pwndbg (https://github.com/pwndbg/pwndbg) in /usr/local/pwndbg/
    * peda (https://github.com/longld/peda.git) in /usr/local/peda/
    * gdbinit (https://github.com/gdbinit/Gdbinit) in /usr/local/gdbinit/
    * pwntools (https://github.com/Gallopsled/pwntools)
    * radare2 (http://www.radare.org/)
    * checksec.sh (http://www.trapkit.de/tools/checksec.html) in /usr/local/bin/checksec.sh

--[ More information ]--

  For more information regarding individual wargames, visit
  http://www.overthewire.org/wargames/

  For support, questions or comments, contact us through IRC on
  irc.overthewire.org #wargames.

  Enjoy your stay!

Byebye !
Connection to localhost closed.

```

```
bandit17@bandit:/$ find -name *bandit18* 2>/dev/null
./home/bandit18
./etc/bandit_pass/bandit18
./run/screen/S-bandit18

```

level 18 > 19 : readme
```
bandit17@bandit:/home/bandit18$ ssh -t bandit18@localhost cat readme
The authenticity of host 'localhost (127.0.0.1)' can't be established.
ECDSA key fingerprint is SHA256:98UL0ZWr85496EtCRkKlo20X3OPnyPSB5tB5RPbhczc.
Are you sure you want to continue connecting (yes/no)? yes
Failed to add the host to the list of known hosts (/home/bandit17/.ssh/known_hosts).
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@         WARNING: UNPROTECTED PRIVATE KEY FILE!          @
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
Permissions 0640 for '/home/bandit17/.ssh/id_rsa' are too open.
It is required that your private key files are NOT accessible by others.
This private key will be ignored.
Load key "/home/bandit17/.ssh/id_rsa": bad permissions
bandit18@localhost's password: 
IueksS7Ubh8G3DCwVzrTd8rAVOwq3M5x
Connection to localhost closed.
```
level 19 > 20 : setuid
```
bandit19@bandit:~$ ls
bandit20-do
bandit19@bandit:~$ file bandit20-do
bandit20-do: setuid ELF 32-bit LSB executable, Intel 80386, version 1 (SYSV), dynamically linked, interpreter /lib/ld-linux.so.2, for GNU/Linux 2.6.32, BuildID[sha1]=8e941f24b8c5cd0af67b22b724c57e1ab92a92a1, not stripped
bandit19@bandit:~$ ./bandit20-do id
uid=11019(bandit19) gid=11019(bandit19) euid=11020(bandit20) groups=11019(bandit19)
bandit19@bandit:~$ ./bandit20-do cat /etc/bandit_pass/bandit20
GbKksEFF4yrVs6il55v6gwY5aVje5f0j
```

명령어
```
file FILE_NAME : 
find /etc -name *bandit17* 2>/dev/null
ssh -i SSHKEY IP :
diff OLD_FILE NEW_FILE : OLD_FILE, NEW_FILE 비교
chmod 600 FILE : FILE 권한을 600으로 바꿈
openssl s_client -connect IP_ADDRESS:PORT 
```

passwords
```
IFukwKGsFW8MOq3IRFqrxE1hxTNEbUPR
5Te8Y4drgCRfCx8ugdwuEX8KFC6k2EUu
8ZjyCRiBWFYkneahHwxCv3wb2a1ORpYL
4wcYUJFw0k0XLShlDzztnTBHiqxU3b3e
BfMYroe26WYalil77FoDi9qh59eK5xNr
cluFn7wTiGryunymYOu4RcffSxQluehd
xLYVMN9WE5zQ5vHacb0sZEVqbrp7nBTn
kfBf3eYk5BPBRzwjqutbbfE887SVc5Yd
IueksS7Ubh8G3DCwVzrTd8rAVOwq3M5x
GbKksEFF4yrVs6il55v6gwY5aVje5f0j
```
#
reference
- [overthewire](https://overthewire.org/)
