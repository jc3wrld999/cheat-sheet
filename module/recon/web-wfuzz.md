wfuzz
#
```
-c  #색상으로 출력
-L  #HTTP리다이렉션을 따름
-t <number>  #동시연결수를 지정(DEFAULT=10)
-hc=<응답코드>  #응답코드(404..)를 숨김
-w <wordlist>  #단어목록
FUZZ    #지정된 페이로드 값으로 대체
```
#
```
wfuzz -c -L -t 300 --hc=404 -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt http://10.129.95.191/FUZZ
```
![image](https://user-images.githubusercontent.com/61821641/149973035-721f7c68-3f64-4397-9c3b-1d8b5d8ffaec.png)