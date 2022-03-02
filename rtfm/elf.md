elf
#
```
readelf -h elf_header
```
![image](https://user-images.githubusercontent.com/61821641/154874020-91b080fd-46d7-4879-a412-d010da480f2b.png)
- Start of section headers(e_shoff): section header table의 시작위치(섹션헤더테이블은 elf 파일의 마지막에 위치)
- Size of section headers(e_shentsize): 섹션 헤더의 크기
- Number of section headers(e_shnum): 섹션 헤더의 개수