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

`tar로 묶기`
```
tar cf <ouput file name> <file1> <file2> <file3> ..
```
![image](https://user-images.githubusercontent.com/61821641/156915137-28ef33c0-3961-43cc-a8d1-6b9106b6d717.png)

![image](https://user-images.githubusercontent.com/61821641/156915146-77f37f1c-e559-493b-8a3e-351863b01b44.png)

`tar.gz로 묶기`
```
tar czf <ouput file name> <file1> <file2> <file3> ..
```
![image](https://user-images.githubusercontent.com/61821641/156915112-8526a1cb-7297-42cb-909c-901ead79e405.png)

![image](https://user-images.githubusercontent.com/61821641/156915122-a0f4729b-669c-4b1f-a1f9-691ef18a8f6d.png)
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