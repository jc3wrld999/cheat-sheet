strace
#

`strace를 사용해 ctf 바이너리의 시스템 콜 행위 조사`
```
strace ./ctf show_me_the_flag
```
![image](https://user-images.githubusercontent.com/61821641/155129268-e51967ed-35d4-4bba-a115-c53c890ca430.png)
- execve
    - 첫번째로 실행
    - 로컬 셸 환경에서 해당 프로그램을 작동시킬 때 호출
    - 그 이후 프로그램 인터프리터에 의해 해당 작업이 진행되고 바이너리를 실행하기 위한 환경을 설정
- openat: 동적링커가 현재 작업디렉토리 하위 디렉토리를 검색하고 라이브러리를 발견
- read: 동적링커가 읽어 들인 후 메모리에 매핑

![image](https://user-images.githubusercontent.com/61821641/155129354-9afb7f22-ba3b-4539-a3a0-5dfa35fa30d3.png)
![image](https://user-images.githubusercontent.com/61821641/155129413-eddf7559-d753-4dd4-9956-a95796eeef99.png)
- write
    - ctf바이너리가 자체적으로 사용한 시스템 콜
    - "checking 'show_me_the_flag'\n", "ok\n" 출력
    - exit_group(1): 오류코드 1이 발생하며 종료
