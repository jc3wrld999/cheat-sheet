zip
#
`file`
```
file -z decoded_payload
```
![image](https://user-images.githubusercontent.com/61821641/154872255-e1041cb5-b429-4c63-8629-58527bd5eefc.png)
#
`zip`
```
unzip <file>
unzip <file> -d <압출 풀 폴더>
```
#
[tar](https://www.geeksforgeeks.org/tar-command-linux-examples/)
```
tar -xvf <archive file>
```
#
`7zip`

설치
```
sudo apt-get install p7zip-full p7zip-rar
```

현재 디렉토리에 아카이브 생성
```
7z a <아카이브 파일 이름> <파일 목록>
```

아카이브 추출
```
7z e <아카이브 파일 이름>
```
#
`bunzip2`

```
bunzip2 <아카이브 파일 이름>
```

#
`gunzip`

```
gunzip <아카이브 파일 이름>
gunzip -d <아카이브 파일 이름>
```
#
`rar`
```
apt-get install rar
apt-get install unrar

unrar e <아카이브>
```
#
`xz`
```
xz -d <아카이브>
```