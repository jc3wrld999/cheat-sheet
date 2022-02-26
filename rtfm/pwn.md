pwn
#
`pwn 문제 흐름`

1. 조사
2. 취약점찾기
3. 공격(Exploit)
4. 셸 착취 / 플래그 읽기
#
`Tools`

- [checksec](https://www.trapkit.de/tools/checksec/)
    - 실행 파일에서 제공하는 보안 메커니즘을 읽기 쉬운 형태로 표시해주는 셸 스크립트
    - RELRO, SSP, NX bit을 확인하는 데 사용
- [peda](https://github.com/longld/peda)
    - python3를 지원하지 않기 때문에 최신 gdb환경에서는 사용할 수 없음
    - [python3를 지원하는 peda](https://github.com/zachriggle/peda)
- [rp++](https://github.com/0vercl0k/rp)
    - 실행파일 안에 존재하는 ROP 가젯을 표시
    - 역어셈블 결과를 보고 찾는 것과는 달리 명령의 일부분을 잘라낸 가젯도 표시
- [socat](http://www.dest-unreach.org/socat/)
    - 타겟 호스트와 포트에 연결해서 풀어야 하는 원격 익스플로잇 환경을 재현
    - 4000번 포트에 연결했을 때 바이너리 파일을 실행
    ```
    socat TCP-LISTEN:4000 EXEC:"./binary"
    ```
    - 이 후 netcat을 사용하는 것처럼 localhost:4000으로 접근하면 대상에서 파일이 실행되어 보통 바이너리를 실행한 것처럼 상호작용할 수 있다.
    - socat의 재사용과 다중 연결을 허용하려면 
    ```
    socat TCP-LISTEN:4000, reuseaddr, fork EXEC:"./binary"
    ```
- [pwntools](https://github.com/Gallopsled/pwntools#readme)
    - 원격 서버에 연결할 수 있는 기능부터 ROP를 구출할 수 있는 기능까지 많은 기능을 제공
#
`조사`

- 로컬 익스플로잇
    - SSH로 로그인해서 문제를 품
- 원격 익스플로잇
    - 호스트명과 포트만 주어짐. 연결하면 문제를 풀기위한 응용프로그램이 있음
- fork형
    - 실행 파일 자신이 소켓 연결 대기를 하고 포크한 자식 프로세스에서 문제 대부분의 처리를 실행
    - 부모 프로세스가 재기동하지 않는 이상 ASLR과 스택 카나리아의 값이 변하지 않음
- xinetd형
    - 표준 입출력을 사용한 실행 파일을 xinetd 같은 별도의 응용프로그램에서 호출해 소켓으로 연결
    - 연결할 때마다 서버에서 기동 파일을 실행하기 때문에 매번 ASLR과 스택카나리아가 바뀜
#
`실행 파일의 보안 메커니즘 확인`

- RELRO(RELocation ReadOnly)
    - 메모리에 배치된 데이터의 어느 부분에 대해 Read Only 속성을 부여할 것인지를 결정
    - 종류
        - No RELRO
        - Partial RELRO
        - Full RELRO
    - GOT Overwrite라는 공격을 할 수 있는지 확인하기 위해 사용
- Stack Smash Protection(SSP)
    - 스택 위에서 발생하는 버퍼 오버플로우를 막기 위한 장치
- NX bit(No eXcute bit)
    - 윈도우에선 DEP(Data Execution Prevention: 데이터 실행 방지)이라고 함
    - 메모리에서 실행될 필요가 없는 데이터를 실행 불가능하도록 설정해서 공격자가 셸 코드를 사용해 공격하는 것이 어렵게 만듦
- ASLR(Address Space Layout Randomization)
    - 스택, 힙, 공유 라이브러리 등을 메모리에 적재할 때 주소의 일부를 랜덤화해서 공격자가 주소를 추측하기 어렵게 만드는 것
- PIE(Positin Independent Executable)
    - 실행 코드 내의 주소 참조를 모두 상대주소로 만들어서 실행파일이 메모리의 어느 위치에 위치하더라도 성공적으로 실행될 수 있게 컴파일된 실행 파일이다.
#
`취약점 탐색`

