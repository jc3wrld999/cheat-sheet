BeEF
#
`set-up`
```
apt-get update
apt-get install beef-xss
```
`run`
```
cd /usr/share/beef-xss
./beef
```
![image](https://blog.kakaocdn.net/dn/caO98V/btrrunuYiCA/spN6sFaRUzD9Nya1aFfw40/img.png)
#
`metasploit`

활성화 >> /etc/beef-xss/config-yaml

![image](https://blog.kakaocdn.net/dn/LiGFb/btrrumCQpF7/RbJC4vSyfrJ9KdzelZAXKk/img.png)

/usr/share/beef-xss/extensions/metasploit/config.yaml 편집

```
host: <TARGET IP>
callback_host: <TARGET IP>
os: 'custom', path: '/usr/share/metasploit-framework'}
```

![image](https://blog.kakaocdn.net/dn/ciIl1w/btrrsnIKJeT/jtS0KploRWFFARcMn18C21/img.png)

```
service postgre start & service metasploit start
msfconsole
```
![image](https://blog.kakaocdn.net/dn/cA8UEq/btrrqmDDvse/8kQLvyawfDdkAG9Ne43Yxk/img.png)

```
load msgrpc ServerHost=10.10.66.49 Pass=abc123
```

```
./beef
```