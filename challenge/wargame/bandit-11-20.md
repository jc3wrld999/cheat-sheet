bandit 11-20
#
level 11: base64 decoding
```
bandit10@bandit:~$ cat data.txt
VGhlIHBhc3N3b3JkIGlzIElGdWt3S0dzRlc4TU9xM0lSRnFyeEUxaHhUTkViVVBSCg==

bandit10@bandit:~$ echo VGhlIHBhc3N3b3JkIGlzIElGdWt3S0dzRlc4TU9xM0lSRnFyeEUxaHhUTkViVVBSCg== | base64 --decode
The password is IFukwKGsFW8MOq3IRFqrxE1hxTNEbUPR
```
level 12: rot13
```
bandit11@bandit:~$ cat data.txt
Gur cnffjbeq vf 5Gr8L4qetPEsPk8htqjhRK8XSP6x2RHh
bandit11@bandit:~$ cat data.txt | tr 'A-Za-z' 'N-ZA-Mn-za-m'
The password is 5Te8Y4drgCRfCx8ugdwuEX8KFC6k2EUu
```
level 13:
1. 16진수 덤프파일 > xxd 명령에 r 옵션으로 16진수 덤프파일을 이진파일로 바꿔준다.
```
bandit12@bandit:~$ mkdir /tmp/gzip
bandit12@bandit:~$ cp data.txt /tmp/gzip
bandit12@bandit:~$ cd /tmp/gzip
bandit12@bandit:/tmp/gzip$ xxd -r data.txt > bandit
```
2. file 명령어로 파일 타입을 확인 > data2.bin 파일을 gzip으로 압축된 파일이라는 걸 알 수 있음
```
bandit12@bandit:/tmp/gzip$ ls
bandit  data.txt
bandit12@bandit:/tmp/gzip$ file bandit
bandit: gzip compressed data, was "data2.bin", last modified: Thu May  7 18:14:30 2020, max compression, from Unix
```
3. mv 명령어로 확장자를 변경
```
bandit12@bandit:/tmp/gzip$ mv bandit data2.bin.gz
bandit12@bandit:/tmp/gzip$ ls
data2.bin.gz  data.txt
```
4. gunzip으로 압축풀기 > 압축해제된 파일은 bzip2로 압축된 파일이다.
```
bandit12@bandit:/tmp/gzip$ gunzip data2.bin.gz
bandit12@bandit:/tmp/gzip$ ls
data2.bin  data.txt
bandit12@bandit:/tmp/gzip$ file data2.bin
data2.bin: bzip2 compressed data, block size = 900k
```
5. 압축 풀고 확장자 바꾸고 압축 풀고 확장자 바꾸고..
```
bandit12@bandit:/tmp/gzip$ mv data2.bin data3.bin.bz2
bandit12@bandit:/tmp/gzip$ bunzip2 data3.bin.bz2
bandit12@bandit:/tmp/gzip$ file data3.bin
data3.bin: gzip compressed data, was "data4.bin", last modified: Thu May  7 18:14:30 2020, max compression, from Unix
bandit12@bandit:/tmp/gzip$ mv data3.bin data4.bin.gz
bandit12@bandit:/tmp/gzip$ gunzip data4.bin.gz
bandit12@bandit:/tmp/gzip$ file data4.bin
data4.bin: POSIX tar archive (GNU)
bandit12@bandit:/tmp/gzip$ mv data4.bin data5.bin.tar
bandit12@bandit:/tmp/gzip$ tar -xvf data5.bin.tar
data5.bin
bandit12@bandit:/tmp/gzip$ file data5.bin
data5.bin: POSIX tar archive (GNU)
bandit12@bandit:/tmp/gzip$ mv data5.bin data6.bin.tar
bandit12@bandit:/tmp/gzip$ tar -xvf data6.bin.tar
data6.bin
bandit12@bandit:/tmp/gzip$ file data6.bin
data6.bin: bzip2 compressed data, block size = 900k
bandit12@bandit:/tmp/gzip$ mv data6.bin data7.bin.bz2
bandit12@bandit:/tmp/gzip$ bunzip2 data7.bin.bz2
bandit12@bandit:/tmp/gzip$ file data7.bin
data7.bin: POSIX tar archive (GNU)
bandit12@bandit:/tmp/gzip$ mv data7.bin data8.bin.tar
bandit12@bandit:/tmp/gzip$ tar -xvf data8.bin.tar
data8.bin
bandit12@bandit:/tmp/gzip$ file data8.bin
data8.bin: gzip compressed data, was "data9.bin", last modified: Thu May  7 18:14:30 2020, max compression, from Unix
bandit12@bandit:/tmp/gzip$ mv data8.bin data9.bin.gz
bandit12@bandit:/tmp/gzip$ gunzip data9.bin.zip
gzip: data9.bin.zip.gz: No such file or directory
bandit12@bandit:/tmp/gzip$ gunzip data9.bin.gz
bandit12@bandit:/tmp/gzip$ file data9.bin
data9.bin: ASCII text
bandit12@bandit:/tmp/gzip$ cat data9.bin
The password is 8ZjyCRiBWFYkneahHwxCv3wb2a1ORpYL
```
level 14:
```

```

password
```
IFukwKGsFW8MOq3IRFqrxE1hxTNEbUPR
5Te8Y4drgCRfCx8ugdwuEX8KFC6k2EUu
8ZjyCRiBWFYkneahHwxCv3wb2a1ORpYL
```

