grep
#
`useful command`

```
grep [OPTION...] PATTERN [FILE...]
    -E        : PATTERN을 확장 정규 표현식(Extended RegEx)으로 해석.
    -F        : PATTERN을 정규 표현식(RegEx)이 아닌 일반 문자열로 해석.
    -G        : PATTERN을 기본 정규 표현식(Basic RegEx)으로 해석.
    -P        : PATTERN을 Perl 정규 표현식(Perl RegEx)으로 해석.
    -e        : 매칭을 위한 PATTERN 전달.
    -f        : 파일에 기록된 내용을 PATTERN으로 사용.
    -i        : 대/소문자 무시.
    -v        : 매칭되는 PATTERN이 존재하지 않는 라인 선택.
    -w        : 단어(word) 단위로 매칭.
    -x        : 라인(line) 단위로 매칭.
    -z        : 라인을 newline(\n)이 아닌 NULL(\0)로 구분.
    -m        : 최대 검색 결과 갯수 제한.
    -b        : 패턴이 매치된 각 라인(-o 사용 시 문자열)의 바이트 옵셋 출력.
    -n        : 검색 결과 출력 라인 앞에 라인 번호 출력.
    -H        : 검색 결과 출력 라인 앞에 파일 이름 표시.
    -h        : 검색 결과 출력 시, 파일 이름 무시.
    -o        : 매치되는 문자열만 표시.
    -q        : 검색 결과 출력하지 않음.
    -a        : 바이너리 파일을 텍스트 파일처럼 처리.
    -I        : 바이너리 파일은 검사하지 않음.
    -d        : 디렉토리 처리 방식 지정. (read, recurse, skip)
    -D        : 장치 파일 처리 방식 지정. (read, skip)
    -r        : 하위 디렉토리 탐색.재귀
    -R        : 심볼릭 링크를 따라가며 모든 하위 디렉토리 탐색.
    -L        : PATTERN이 존재하지 않는 파일 이름만 표시.
    -l        : 패턴이 존재하는 파일 이름만 표시.
    -c        : 파일 당 패턴이 일치하는 라인의 갯수 출력.
```
#
`파일이름을 잃어버린 경우`
```
grep -r -H "찾을 파일"
```
#
`파일에서 특정 텍스트를 검색`
```
grep "찾을 텍스트" <찾을 파일>
```
#
`문자열을 포함하는 전체 파일 목록`
```
grep -l "찾을 문자열"
```
#
`현재 디렉토리 모든 파일에서 문자열 검색`
```
grep <문자열> *
```
`+확장자`
```
grep <문자열> *.txt
```
#
`대소문자 구분없이 검색`
```
grep -i <문자열> <찾을 파일>
```
#
Example

```
grep 'ELF' * | more
```
![image](https://user-images.githubusercontent.com/61821641/154872898-ff9bfbed-6f8d-4c61-b4d9-be5a4d1dd15d.png)
- 비트맵 이미지 파일로 보였던 67b8601 파일에서도 ELF라는 문자열이 발견됐다.

#
reference
- [_](https://recipes4dev.tistory.com/157)
