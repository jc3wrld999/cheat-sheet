http
#
http는 암호화 되어있지 않기 때문에 telnet이나 netcat으로 간단하게 접근가능하다.
```
telnet <TARGET IP> 80
```
```
GET <요청 문서> HTTP/1.1
host: telnet
```
다음 명령으로 서버에 올라가 있는 html이나 image 파일을 요청할 수 있다. 마지막에는 enter를 두번 입력해야 한다.
![image](https://user-images.githubusercontent.com/61821641/151921738-59e3093f-83bb-4467-b17a-5bf485fa29d7.png)

![image](https://user-images.githubusercontent.com/61821641/151922083-67712b9a-51e3-4e3d-9039-9f1c9019fa28.png)