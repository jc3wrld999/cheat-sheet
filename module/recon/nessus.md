Nessus
#
`install`

1. [package download](https://www.tenable.com/downloads/nessus?loginAttempted=true)

2. dpkg
```
dpkg -i <down받은 package>
```

3. Nessus 서비스를 시작
```
/bin/systemctl start nessusd.service
```

4. https://localhost:8834/ 에 접속

![image](https://user-images.githubusercontent.com/61821641/154102241-3c1c4e95-c02d-4584-bd0e-6b21aa0e0a3c.png)

#
`Create New Scan`

![image](https://user-images.githubusercontent.com/61821641/154119857-9c12bdfe-183a-4eb2-9282-212758dd7555.png)

![image](https://user-images.githubusercontent.com/61821641/154104521-a3e8a5e1-1180-4c0d-af0b-eb3e71d35dbf.png)

스캔할 시간을 정할 수 있다. 마치 배치

![image](https://user-images.githubusercontent.com/61821641/154105275-8f41e1a7-401d-4281-ba88-29a0d7927fb2.png)

포트 스캔 범위를 정할 수 있다.

![image](https://user-images.githubusercontent.com/61821641/154105434-e4d74e95-b682-4acd-b0aa-6a2b35dfd87e.png)

더 낮은 대역폭 연결을 할 수 있다.

![image](https://user-images.githubusercontent.com/61821641/154105184-27484a3a-6d4e-43f3-91cf-8d052c38b058.png)

스캔 결과로 http server를 확인할 수 있었다.

![image](https://user-images.githubusercontent.com/61821641/154119551-d5828ac0-a2e3-40c4-adac-8f0273a51db5.png)

Web Application Tests로 다시 스캔을 시도한다.

![image](https://user-images.githubusercontent.com/61821641/154119758-1d09e8ff-93dd-4950-a525-c89027f0e42a.png)
