assembly language manual
#
레지스터
```
EAX : 산술계산을 하며 리턴값을 전달/ 가장 많이 사용되는 변수/ Accumulator(축전지)
EDX : EAX와 역할은 같되 리턴값의 용도로는 사용되지 않음/ Data
ECX : 루프문을 수행할 때 Counting/ i++이아닌 미리 루프 돌 값을 넣어놓고 i--를 한다./카운팅할 필요없으면 변수로 써도된다.
EBX : 어떤 목적을 가지고 만들어진 레지스터가 아니므로 레지스터가 하나쯤 더 필요하거나 공간이 필요할 때 등
ESI, EDI : EAX~EDX는 주로 연산에 쓰이지만 ESI는 시작지 인덱스, EDI는 목적지 인덱스로 사용된다.
```
명령어
```
PUSHAD : 모든 레지스터를 PUSH
POPAD : 모든 레지스터를 POP
MOV : 값을 할당
LEA : 주소를 할당
ADD : src를 dest에 더하기
SUB : src를 dest에 빼기
INT : 인터럽트를 일으킴/ 뒤의 오퍼랜드에 따라 처리가 다름/ 애플리케이션 레벨에서의 인터럽트는 한계가 있고 rings0 레벨로 내려가기 전까진 거의 사용할 일 없는 명령어(네이티브 api를 호출할 때 이용됨)/ 가장 많이 만나는 것은 INT 3로 옵코드가 0xCC인 DebugBreak()
CALL : 함수호출/ 뒤에 오퍼랜드로 번지가 붙음/해당 번지를 호출하고 작업이 끝나면 CALL 다음 번지로 돌아옴/ 왜냐면 CALL로 호출된 코드 안에서는 반드시 RET를 만나게 되어 다시 호출한 쪽으로 돌아오기 때문
INC : i++
DEC : i--
AND, OR, XOR
NOP :  아무것도 하지말라는 명령어/ 해킹이나 리버싱에서 가장 많이 쓰이는 명령어이기도
CMP, JMP : 비교해서 점프하는 명령어
```
#
data size       

| Intel Data Type | Suffix | Size(bytes) |
| --- | --- | --- |
| Byte | b | 1 |
| Word | w | 2 |
| Double Word | l | 4 |
| Quad Word | q | 8 |
| Single Precision | s | 4 |
| Double Precision | l | 8 |

register를 사용하여 데이터를 조작할 때
```
(Rb, Ri) = MemoryLocation[Rb + Ri]
D(Rb, Ri) = MemoryLocation[Rb + Ri + D]
(Rb, Ri, S) = MemoryLocation(Rb + S * Ri]
D(Rb, Ri, S) = MemoryLocation[Rb + S * Ri + D]
```
jump type

| Jump Type | Description |
| --- | --- |
| jmp | Unconditional |
| je | Equal/Zero |
| jne | Not Equal/Not Zero |
| js | Negative |
| jns | Nonnegative |
| jg | Greater |
| jge | Greater or Equal |
| jl | Less |
| jle | Less or Equal |
| ja | Above(unsigned) |
| jb | Below(unsigned) |
그 외
```
leaq source, destination: 목적지를 소스의 표현식이 나타내는 주소로 설정
addq source, destination: 목적지 = 목적지 + 소스
subq source, destination: 목적지 = 목적지 - 소스
imulq source, destination: 목적지 = 목적지 * 소스
salq source, destination: 목적지 = 목적지 << 소스 .
sarq source, destination: 대상 = 대상 >> 소스 
xorq source, destination: 대상 = 대상 XOR 소스
andq source, destination: 목적지 = 목적지 & 소스
orq source, destination: 목적지 = 목적지 | 소스
```
debugging 명령어
```
r2 -d DIRECTORY_NAME : 디버깅 모드에서 바이너리를 연다.
aa : 분석 (실행파일의 모든 symbol과 entry point)
e asm.syntax=att : AT&T구문을 사용하고 있는지 확인하기
afl : function list
pdf : print disassembly function
? : help
a? : 분석 help
dc : 실행을 시작 breakpoint에서 멈춤
ds : 다음 명령을 검색/이동
db : breakpoint
dr : register값 보기
pdf
px
```
| 64 bit | 32 bit |
| --- | --- |
| %rax | %eax |
| %rbx | %ebx |
| %rcx | %ecx |
| %rdx | %edx |
| %rsi | %esi |
| %rdi | %edi |
| %rsp | %esp |
| %rbp | %ebp |
| %r8 | %r8d |
| %r9 | %r9d |
| %r10 | %r10d |
| %r11 | %r11d |
| %r12 | %r12d |
| %r13 | %r13d |
| %r14 | %r14d |
| %r15 | %r15d |
#
reference

`common`
- [레나](https://tuts4you.com/)
- [virginia guide](https://www.cs.virginia.edu/~evans/cs216/guides/x86.html)
- [NASM tutorial](https://cs.lmu.edu/~ray/notes/nasmtutorial/)
- [wiki docs](https://wikidocs.net/146018)
