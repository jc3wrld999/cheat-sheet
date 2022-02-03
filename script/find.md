find
#
`>`

리디렉션 연산자 >를 find 명령어와 함께 사용할 수 있다는 것입니다. 검색 결과를 파일에 저장할 수 있으며, 더 중요한 것은 가능한 오류의 출력을 억제하여 출력을 보다 쉽게 읽을 수 있도록 할 수 있습니다. 이것은 2> /dev/null을 당신의 명령에 추가함으로써 이루어진다. 이렇게 하면 액세스가 허용되지 않은 결과를 볼 수 없습니다.

`-exec`

find 명령에서 -exec 플래그에 따라 새 명령을 실행할 수 있습니다(예: -exec whomi \;). 이 옵션을 통해 활성화할 수 있는 가능성은 이 튜토리얼의 범위를 벗어나지만 권한 상승에 사용할 수 있습니다.
#
`a.txt 파일 검색`
```
find . -name a.txt
```
#
`특정 문자열로 시작하는 파일 ~a`
```
find . -name a*
```
`확장자 검색`
```
find . -name *.txt
```
#
`모든 디렉토리 목록`
```
find . -type d
```
`모든 파일 목록`
```
find . -type f
```
#
`지난 3일 동안 수정된 파일`
```
find . -mtime -3
```
#
`하위 디렉토리 검색하지 않기`
```
find / -maxdepth 1 -name a.txt
```
파일을 루트(/) 디렉토리에서만 검색
#
`검색 후 삭제`
```
find . -name *.php -delete
```
#
`검색 상세정보`
```
find . -name "*.c" -exec ls -l {}
```
현재 디렉토리에서 c 확장자 파일 상세 정보 출력
#
`검색파일 라인수`
```
find . -name "*.c" -exec wc -l {}
```
#
`검색 파일에서 문자열 검색`
```
find . -name "*.c" -exec grep "main" {} \;                # .c 파일에 문자열 main이 있는지 검색.
find . -name "*.java" -exec grep -n "class" {} \         # .java 파일에 문자열 class가 있는 라인 표시.
```
#
`검색된 파일 복사`
```
find . -name a.txt -exec cp {} <file-dir>
```
#
`파일이 사용자 uname 에 의해 소유된 경우 true를 반환`
```
find -user <uname>
```
`예`
```
find / -user pingu
```
![image](https://user-images.githubusercontent.com/61821641/149617366-8db8b4bc-a1e5-4a2c-afe0-66bf6c3620ac.png)
#
`permission denied 오류 필터링`
```
find . 2>/dev/null
```

#
`소유자 가 정확히 읽고 쓸 수 있고 다른 모든 사람이 읽을 수 있는 모든 파일 찾기`
```
find / -type f -perm 644
```
`누구나 읽을 수 있는 모든 파일 찾기`
```
find / -type f -perm /444
```
#
reference
- [_](https://recipes4dev.tistory.com/156#31-%ED%98%84%EC%9E%AC-%EB%94%94%EB%A0%89%ED%86%A0%EB%A6%AC%EC%97%90-%EC%9E%88%EB%8A%94-%ED%8C%8C%EC%9D%BC-%EB%B0%8F-%EB%94%94%EB%A0%89%ED%86%A0%EB%A6%AC-%EB%A6%AC%EC%8A%A4%ED%8A%B8-%ED%91%9C%EC%8B%9C)
- [_](https://www.computerhope.com/unix/ufind.htm)
#
