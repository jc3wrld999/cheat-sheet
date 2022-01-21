smbclient
#
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
`exploit`

- [CVE-2017-7494](https://www.cvedetails.com/cve/CVE-2017-7494/)
