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
