`smbclient`
#
syntax
```
smbclient //[IP]/[SHARE]
```
options
```
-U #user
-L #share list
-p #port
```

1. list 뽑고
```
smbclient -L 10.129.8.157 -U Administrator 
```
![image](https://user-images.githubusercontent.com/61821641/148740891-999c4e16-d140-46e0-8047-e84f9a0ed2c0.png)

끝에 $는 관리 공유를 표시

2. 공유리스트로 액세스

```
smbclient \\\\10.129.8.157\\ADMIN$ -U Administrator 
```
![image](https://user-images.githubusercontent.com/61821641/148741212-fd257a37-372c-40d9-90f0-836731b71bc7.png)

```
smbclient -N -L \\\\10.129.10.239\\ 
```
![image](https://user-images.githubusercontent.com/61821641/148744022-126985cc-7d49-4c07-ac6f-86a6c313c762.png)

#
`enum4linux` 

SMB 공유를 열거

syntax

```
enum4linux <option> ip
```
options

**TAG**            **FUNCTION**

\-U             get userlist  
\-M             get machine list  
\-N             get namelist dump (different from -U and-M)  
\-S             get sharelist  
\-P             get password policy information  
\-G             get group and member list

\-a             위의 모든 것(전체 기본 열거)

#
`impacket`

- [_](https://www.infosecmatter.com/rce-on-windows-from-linux-part-1-impacket/)

#
`exploit`

- [CVE-2017-7494](https://www.cvedetails.com/cve/CVE-2017-7494/)
