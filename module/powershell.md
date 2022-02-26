powershell
#
SEARCH_KEYWORD가 들어간 디렉토리를 재귀적으로 검색
```
dir -Force -recurse *.* | sls -pattern "SEARCH_KEYWORD" | select -unique path
```
#
`get-help`

![image](https://user-images.githubusercontent.com/61821641/154290202-3f875458-6297-45ff-8e54-509b692e04f2.png)

#
`get-command`

Get-Command는 현재 컴퓨터에 설치된 모든 cmdlet 을 가져옵니다. 이 cmdlet  의 장점은 다음과 같은 패턴 일치를 허용한다는 것입니다.

![image](https://user-images.githubusercontent.com/61821641/154290664-0d78f6ec-bcd7-4524-aeb9-5eaedb8b960c.png)

#
`Object Manipulation`

Pipeline(|)은 한 cmdlet  에서 다른 cmdlet으로 출력을 전달하는 데 사용됩니다. 다른 셸과 비교하여 가장 큰 차이점은 파이프 뒤에 있는 명령에 텍스트나 문자열을 전달하는 대신 powershell이 ​​개체를 다음 cmdlet에 전달한다는 것입니다. 객체 지향 프레임워크의 모든 객체와 마찬가지로 객체에는 메서드와 속성이 포함됩니다. 메서드는 cmdlet 의 출력에 적용할 수 있는 함수로 생각할 수 있고  속성은 cmdlet의 출력에서 ​​변수로 생각할 수 있습니다.

```
Get-Command | Get-Member -MemberType Method
```

![image](https://user-images.githubusercontent.com/61821641/154291237-64d2e2ca-d5ad-4c06-9c15-32b49004d485.png)
#
`이전 cmdlet 에서 개체 만들기`

개체를 조작하는 한 가지 방법은 cmdlet의 출력에서 ​​속성을 가져오고 새 개체를 만드는 것입니다. 이 작업은 Select-Object cmdlet을 사용하여 수행됩니다. 

```
get-childitem | select-object -property mode, name
```
![image](https://user-images.githubusercontent.com/61821641/154291593-bb9a726b-c70c-43e6-944a-497168844b21.png)

다음 플래그를 사용하여 특정 정보를 선택할 수도 있습니다.

first - 첫 번째 x 개체를 가져옵니다.
last - 마지막 x 개체를 가져옵니다.
unique - 고유한 개체를 표시합니다.
skip - x개 개체를 건너뜁니다

#
`개체 필터링`

출력 개체를 검색할 때 매우 구체적인 값과 일치하는 개체를 선택하려고 할 수 있습니다. Where-Object속성 값을 기반으로 필터링하려면 to를  사용하여 이 작업을 수행할 수 있습니다 .

이 cmdlet  을  사용하는 일반적인 형식은 다음과 같습니다.

Verb-Noun | Where-Object -Property PropertyName -operator Value

Verb-Noun | Where-Object {$_.PropertyName -operator Value}

두 번째 버전은 $_ 연산자를 사용하여 Where-Object cmdlet에 전달된 모든 개체를 반복합니다.

다음은 중지된 프로세스를 확인하는 예입니다.
```
get-service | where-object -property status -eq stopped
```
![image](https://user-images.githubusercontent.com/61821641/154292352-406c8847-8aee-4345-801f-63769bb880cc.png)
#
`개체 정렬`

```
get-childitem | sort-object
```
![image](https://user-images.githubusercontent.com/61821641/154292521-4231f372-49a5-40d8-bf83-d03b6605e52c.png)

#
`찾기`

```
get-childitem -r -includes *포함단어*
get-content '전체경로'
```
![image](https://user-images.githubusercontent.com/61821641/154293900-80a518fb-4375-4966-a0c3-1a548a85fe54.png)

#
`설치된 cmdlet의 개수`

```
get-command -commandtype cmdlet | measure-object
```
#
`file의 해시값 가져오기`

```
get-filehash '전체경로' -algorithm <해시 알고리즘>
```
![image](https://user-images.githubusercontent.com/61821641/154295406-be236065-26f7-48c1-9f70-039b2584027b.png)
#
`현재 위치`

```
get-location
```
![image](https://user-images.githubusercontent.com/61821641/154295541-3af33ea3-52a0-4dd7-b205-046249f97464.png)
#
`해당 디렉토리가 존재하는지`
```
test-path <path>
```
#
`web-server 에 요청`
```
invoke-webrequest localhost
```
#
`base64 decoding`
```
$encoded = get-content 'file path'
[system.text.encoding]::ASCII.GetString([System.Convert]::FromBase64String($encoded))  | write-output
```
![image](https://user-images.githubusercontent.com/61821641/154297386-0970cf05-b629-48a2-ac5e-05d502fdb8c3.png)