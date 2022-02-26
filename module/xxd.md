xxd
#
```
-s(seek) : 해당 파일의 시작 지점의 오프셋
-l(length) : 덤프할 바이트 길이
```
#
```
xxd 67b8601 | head -n 15 
```
- 비트맵 파일을 xxd로 열어서 15번 줄까지 출력
![image](https://user-images.githubusercontent.com/61821641/154872990-639f7a55-f3be-4561-b8c3-f600d254a905.png)
#
```
xxd -c 32 67b8601 | head -n 15
```
- 한줄에 32바이트 표시
![image](https://user-images.githubusercontent.com/61821641/154873138-c1b8b39c-2bfa-4279-96e9-702ca9398f43.png)

#
```
xxd -b 67b8601 | head -n 15 
```
- -b:2진법
![image](https://user-images.githubusercontent.com/61821641/154873258-52f63aab-c474-40a2-adee-d869f5326c85.png)
#
```
xxd -i 67b8601 | head -n 15
```
- -i:c언어 형식의 바이트 배열
#