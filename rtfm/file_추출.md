file 추출
#

```
dd skip=52 count=64 if=67b8601 of=elf_header bs=1
```
- 비트맵 파일의 52번째(0x34) 오프셋 위치에서부터 시작해 64바이트 크기만큼 elf_header로 추출