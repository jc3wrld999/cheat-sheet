
#
`je`

jump if equal

일반적으로 cmp 명령 다음에 발견된다.
```
cmp  edx, 42
je   short loc_402B13    ; if edx equals 42, jum to loc_402B13
```
`jne`
```
```
#
`jz`

jump that follows a test

일반적으로 0과 같은 것을 명시적으로 테스트하는 데 사용      

```
test eax, eax            ; test if eax=0
jz   short loc_402B13    ; if condition is met, jump to loc_402B13
```
#
```
add
sub
```

#
reference
- [_](https://www.aldeid.com/wiki/X86-assembly/Instructions/jz)
- [_](https://www.keil.com/support/man/docs/armasm/armasm_dom1361289908389.htm)
