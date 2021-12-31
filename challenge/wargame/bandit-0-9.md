bandit 0-9
#
level 0 > 1: readme 읽기
​
```
ls
cat readme
```
​
level 1 > 2 : dashed filename (참고: [고급 bash 스크립팅 가이드](https://tldp.org/LDP/abs/html/special-chars.html))
​
```
cat ./-
```
​
level 2 > 3 : spaces in filename
​
```
cat ./spaces\ in\ filename
```
​
level 3 > 4 : hidden file
​
```
ls -a
cat .hidden
```
​
level 4 > 5 : file
​
-   human-readable
​
```
file ./-*
```
​
level 5 > 6 : find
​
-   human-readable
-   1033 bytes in size
-   not executable
​
```
find -size 1033c
```
​
level 6 > 7 : find
​
-   owned by user bandit7
-   owned by group bandit6
-   33 bytes in size
​
```
find -user bandit7 -group bandit6 -size 33c
```
​
level 7 > 8 : data.txt 파일 내용중 millionth 옆에 비밀면호가 있음
​
```
grep "millionth" data.txt
```
​
level 8 > 9 : data.txt에서 유일하게 한번만 작성된 문장
​
```
cat data.txt | sort | uniq -u
```
​
level 9 > 10 : 몇 개의 '='가 앞에 오는 사람이 읽을 수 있는 몇가지 문자열중 하나
​
```
strings data.txt |grep "="
```
​
명령어 정리
​
```
file 파일명 #파일명 파일의 종류를 출력
find 파일명 #파일명으로 된 파일을 찾는다
find -size 용량/단위 #용량/단위인 파일을 찾는다
find -user 사용자이름 #소유중인 사용자이름이 사용자이름인 파일을 찾는다
find -group 그룹이름 #소유중인 그룹이름이 그룹이름인 파일을 찾는다
grep "문장" 파일명 #파일명에서 문장이 속한 해당줄을 출력
sort 파일명 #파일명 내부의 문장이 오름차순으로 정렬
uniq 파일명 #파일명 내부의 문장들 중 연속된 중복 문장을 하나만 출력
uniq -u 파일명 #파일명 내부의 문장들 중 연속된 중복 문장을 모두 삭제하고 출력
```
​
passwords
​
```
boJ9jbbUNNfktd78OOpsqOltutMc3MY1
CV1DtqXWVFXTvM2F0k09SHz0YwRINYA9
UmHadQclWmgdLOKQ3YNgjWxGoRMb5luK
pIwrPrtPN36QITSp3EQaw936yaFoFgAB
koReBOKuIDDepwhWk7jZC0RTdopnAYKh
DXjZPULLxYr17uwoI01bNLQbtFemEgo7
HKBPTKQnIay4Fw76bEy8PVxKEDQRKTzs
cvX2JJa4CFALtqS87jk27qwqGhBM9plV
UsvVyFSfZZWbi6wgC7dAFyFuR6jQQUhR
truKLdjsbJ5g7yyJ2X2R0o3a5HQJFuLk
```

#
reference
- [overthewire](https://overthewire.org/)
