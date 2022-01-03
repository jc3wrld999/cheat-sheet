assembly language manual
#
`mov`
```
movl $1, %eax
```
- l은 long(4바이트)을 의미/word(2바이트)/b(1바이트)
- $은 상수값을 의미

주소지정방식
- register addressing
- immediate addressing
- memory addressing
![image](https://user-images.githubusercontent.com/61821641/147911493-b212e564-f43c-4573-9291-00761911bebd.png)
```
movl 2000, %ebx                 ;주소가 2000인 위치의 값을 %ebx에 넣음
movl (%eax), %ebx               ;   주소인 %eax가 가리키는 값을 %ebx에 넣음
movl 2000(%eax), %ebx           ; 2000 + %eax가 가리키는 값을 %ebx에 넣음
movl (,%eax,4), %ebx            ; %eax * 4 위치의 값을 %ebx에 넣음
movl 2000(%edx,%eax,4), %ebx    ; 2000+%edx+%eax*4 위치의 값을 %ebx에 넣음
```
#
`shift`

부호가 없는 연산 (부호가 없는 연산은 시프트 연산을 했을 때 해당메모리의 범위를 넘어가면 값을 잃어버리게 된다.)
- 왼쪽으로 이동 : shl
- 오른쪽으로 이동 : shr


부호가 있는 연산
- 왼쪽으로 이동 : sal
- 오른쪽으로 이동 : sar
```
ex)
eax = -4;
eax << 2;

-4의 보수: 0000 0100 > 1111 1011 > 1111 1100
    1111 1100
 11 1111 0000
    0011 1100
```

#
reference

- [virginia guide](https://www.cs.virginia.edu/~evans/cs216/guides/x86.html)
- [NASM tutorial](https://cs.lmu.edu/~ray/notes/nasmtutorial/)
- [wiki docs](https://wikidocs.net/146018)