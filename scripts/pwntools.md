pwntools
#
`checksec`
```
checksec <dir>
```
![image](https://user-images.githubusercontent.com/61821641/150648618-2aae3665-aa3a-4249-9486-c76f94e91120.png)

Arch
```
Archetecture
```

[RELRO](https://www.redhat.com/en/blog/hardening-elf-binaries-using-relocation-read-only-relro)
```
Relocation Read-Only(재배치 읽기 전용)
링커가 기능을 해결한 후 전역 오프셋 테이블(GOT)을 읽기 전용으로 만듭니다. GOT는 ret-to-libc 공격과 같은 기술에 중요합니다.
```
[Stack canaries](https://www.sans.org/blog/stack-canaries-gingerly-sidestepping-the-cage/)
```
스택 오버플로를 감지하기 위해 스택 뒤에 배치되는 토큰입니다. 이들은 석탄 광부가 유독 가스를 감지하기 위해 광산으로 가져온 새의 이름을 따서 명명되었습니다. 카나리아는 연기에 민감했기 때문에 그들이 죽으면 광부들은 대피해야 한다는 것을 알았습니다. 덜 병적이지만 스택 카나리아는 메모리(프로그램 변수가 저장되는 곳)의 스택 옆에 있으며 스택 오버플로가 있으면 카나리아가 손상됩니다. 이렇게 하면 프로그램이 버퍼 오버플로를 감지하고 종료할 수 있습니다.
```
![image](https://user-images.githubusercontent.com/61821641/150649213-4dd7ebd3-a83c-400f-8e18-724e8d5f5e29.png)

버퍼오버플로우가 발생했을 때 카나리가 있는 intro2pwn1에선 `stack smashing`이 카나리가 없는 intro2pwn2에선 `Segmentation fault`가 발생한걸 볼 수 있다.

[NX](https://en.wikipedia.org/wiki/Executable_space_protection)
```
non-executable(실행 불가능)
이것이 활성화되면 메모리 세그먼트는 쓰기 가능하거나 실행 가능하지만 둘 다일 수는 없습니다. 이렇게 하면 쓰기 가능한 세그먼트의 무언가를 실행할 수 없기 때문에 잠재적인 공격자가 자신의 악성 코드(셸코드)를 프로그램에 삽입하는 것을 방지할 수 있습니다. 취약한 바이너리에서 읽고, 쓰고, 실행할 수 있는 세그먼트가 있음을 나타내는 추가 라인 RWX 를 보셨을 것 입니다.
```
[PIE](https://access.redhat.com/blogs/766093/posts/1975793)
```
Position Independent Executable
프로그램 종속성을 임의의 위치에 로드하므로 메모리 레이아웃에 의존하는 공격을 수행하기가 더 어렵습니다. 
```
reference
- [guide](https://blog.siphos.be/2011/07/high-level-explanation-on-some-binary-executable-security/)
#
`cyclic`
```
r < alphabet
```
![image](https://user-images.githubusercontent.com/61821641/150650742-00fba0f6-1fe9-42ba-8d4a-b470c9a68d21.png)

위처럼 버퍼오버플로우를 일으킬 만큼 충분한 크기의 파일을 생성
```
cyclic 100 > pattern 
```
```
r < pattern
```
![image](https://user-images.githubusercontent.com/61821641/150651346-70ceabd6-9beb-4fd7-ab0c-ede3d4cd2180.png)

`jaaa`에서 오버플로우

exploit 생성
```
from pwn import *

# padding = cyclic(100)
# eip를 채울 수 있도록 패딩이 'jaaa' 바로 앞에서 중지되어야 합니다. 
padding = cyclic(cyclic_find('jaaa'))    
# 패딩이 올바른지 확인하기 위해 0xdeadbeef와 같은 더미 값으로 채워야 합니다.
# 컴퓨터가 "0xdeadbeef" 문자열을 ASCII로 해석하기 때문에 Pwntools는 p32() 함수(64비트 프로그램의 경우 p64)를 사용하여 이를 수행하는 쉬운 방법을 제공합니다. struct.pack() 함수와 유사합니다. 
eip = p32(0xdeadbeef)

payload = padding + eip

print(payload)
```
