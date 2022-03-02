file 탐색
#
`file`
```
file payload 
```
![image](https://user-images.githubusercontent.com/61821641/154871971-52cb4bd2-ed34-4c8f-9319-ae17118a5175.png)
#

`head` --첫줄부터 10줄정도의 텍스트를 출력
```
head payload
```
![image](https://user-images.githubusercontent.com/61821641/154872041-7f2d6539-bbee-4dd3-8bfc-7924372f7cb3.png)

#
`xxd`

```
xxd elf_header
```
![image](https://user-images.githubusercontent.com/61821641/154873965-b80bee3f-8bba-4360-adae-c277c9d856a2.png)

```
xxd 67b8601 | head -n 15 
```
- 비트맵 파일을 xxd로 열어서 15번 줄까지 출력
![image](https://user-images.githubusercontent.com/61821641/154872990-639f7a55-f3be-4561-b8c3-f600d254a905.png)
- 0x34(=52)에서 ELF라이브러리로 추정되는 부분이 시작됨을 알 수 있음
- ELF 파일의 헤더 부분의 매직코드와 64비트 시스템용 ELF 바이너리의 헤더는 정확히 64비트로 구성된다는 전제를 이용
- ELF 헤더의 내용을 통해 전체 파일 크기를 파악할 수 있음

#
