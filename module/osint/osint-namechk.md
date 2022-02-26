namechk
#
`install`
```
git clone https://github.com/GONZOsint/Namechk.git
```

```
cd Namechk
chmod+x namechk.sh
./namechk.sh
```
![image](https://user-images.githubusercontent.com/61821641/150202867-51b576a7-f46f-4772-a938-bb5ef782db26.png)

#
`run`

`help`
```
./namechk.sh -h
```
![image](https://user-images.githubusercontent.com/61821641/150203026-c23396f8-6a55-4f68-9377-cacae5f68bd4.png)

`name이 사용가능한 플랫폼 확인`
```
./namechk.sh <name> -au
```
`name이 사용된 플랫폼 확인`
```
./namechk.sh <name> -fu
```
`특정 플랫폼에서 사용된 name 검색`
```
./namechk.sh tally3 -fu -co
<web site>
```
`특정 플랫폼에서 사용가능한 name 검색`
```
./namechk.sh tally3 -au -co
<web site>
```
`사전 파일로 검색`
```
./namechk.sh -l -fu <file name>
```
#
reference
- [geeksforgeeks](https://www.geeksforgeeks.org/namechk-osint-tool-for-usernames/?ref=gcse)