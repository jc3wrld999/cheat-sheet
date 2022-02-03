powershell
#
SEARCH_KEYWORD가 들어간 디렉토리를 재귀적으로 검색
```
dir -Force -recurse *.* | sls -pattern "SEARCH_KEYWORD" | select -unique path
```