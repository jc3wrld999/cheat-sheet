radare2

#
`analytics`
```
aaa # 모든것을 분석 -A로 radare와 함께 실행하는 것과 동일
```
```
af #함수에 대한 기본 분석
afl #모든 함수 나열
```
![image](https://user-images.githubusercontent.com/61821641/150521818-9b4b3d9c-829b-4716-a2cb-31e9efe2d460.png)
#
`debuging`
```
-d #디버깅모드 활성화
db <break-point address> #break-point 설정
dc #한단계씩 디버깅
```
#
`visual mode`

```
v #visual mode
vV
```
![image](https://user-images.githubusercontent.com/61821641/150522098-a962e5d7-3c3d-40eb-988d-ec2b19e3f09c.png)
```
agv @<function name> #graph mode
```
![image](https://user-images.githubusercontent.com/61821641/150230006-c2f1a774-ff38-4410-a0a0-370c52f75b32.png)

esc

#
`file`
```
-w #쓰기모드에서 파일열기
- #파일을 열지 않고 콘솔에 들어가기
```
#
`info`
```
i #바이너리의 일반정보
```
![image](https://user-images.githubusercontent.com/61821641/150521651-8ab3bf30-148a-4e7c-89cf-626c2f941ba7.png)
```
ia #파일의 모든 정보
```
![image](https://user-images.githubusercontent.com/61821641/150522600-2a14f4f7-71c0-4687-919e-450bdf31beb0.png)
![image](https://user-images.githubusercontent.com/61821641/150521529-db5e0891-fa3d-4c23-84a5-2d1d056c3f1e.png)
```
izz #바이너리의 모든 문자열
```
![image](https://user-images.githubusercontent.com/61821641/150521734-b72b673b-2bcf-4fa8-b33c-4d96f40fc2fa.png)
```
j #json 출력/ 명령 끝에 추가
```
```
ie @<function> #entry point 찾기
```
![image](https://user-images.githubusercontent.com/61821641/150522806-227e87e3-1612-4f80-afa3-6163a4308dbb.png)
#
`memory`
```
s #현재 메모리 주소 출력
s <memory address> #memory 주소로 이동
s+ <number> #숫자만큼 바이트 이동
s- <number> #숫자만큼 바이트 이동
s- #이전 명령을 취소
s main #main 함수 메모리 주소로 이동
sr rax #rax 레지스터 주소로 이동
```
![image](https://user-images.githubusercontent.com/61821641/150523890-40f26c56-7d5a-497a-87d5-f84e3afcf13c.png)
#
`print`
```
px #현재 메모리의 16진수 출력
```
![image](https://user-images.githubusercontent.com/61821641/150524253-f4ea1350-cef8-48af-aa25-476cf085f1a7.png)

```
pd @<memory address> #메모리의 disassembly 출력
```
![image](https://user-images.githubusercontent.com/61821641/150524498-0b0e8c14-0d55-497d-bc13-85443a299065.png)

```
pxe # 이모지 hexdump 출력
```
![image](https://user-images.githubusercontent.com/61821641/150524758-372d6e83-e983-4794-8340-5a3259c942ce.png)

```
pC @<memory address> #열형식으로 disassembly
```
![image](https://user-images.githubusercontent.com/61821641/150524890-cacf9385-9006-498a-b6d7-c9adfb375eb9.png)

#
```
ood '<arg>' # 변수설정
```
#
- [_](https://www.megabeets.net/a-journey-into-radare-2-part-2/)
