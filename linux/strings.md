strings
#
`10보다 큰 문자열을 가져옴`
```
strings -n 10 <file>
```
#
`10자에서 100자 사이의 문자열`
```
strings Level0.exe | grep -E '.{10,100}'
```