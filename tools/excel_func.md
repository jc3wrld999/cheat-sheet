## Excel Functions List
#
## 논리

`IFERROR`
```
=IFERROR(조건,error처리)
=IFERROR(1/0,0)
```
`IFS`
```
=IFS(조건,리턴,조건,리턴....)
```
`XOR`
```
=XOR(FALSE,FALSE) #RETURN FALSE 나머지 경우는 다 TRUE
```
`SWITCH`
```
=SWITCH(값,비교값,RETURN,비교값,RETURN,비교값,RETURN..)
```
![image](https://user-images.githubusercontent.com/61821641/152686312-17fa7829-06e4-4e89-b745-22f4bf974487.png)

#
## 날짜

`DATE`
```
=DATE(년,월,일)
```
`DATEDIF`
```
=DATEDIF(날짜1,날짜2,{y,m,d})
```
`DAYS`
```
@RETURN 두 날짜 사이의 일수
=DAYS(날짜1, 날짜2) 
```
`DAYS360 --모든 달을 30일로 가정`

`EDATE, EOMONTH`
```
@RETURN n개월 더함
=EDATE(날짜, n)
=EOMONTH(날짜, n)
```

`NETWORKDAYS --두 날짜 사이의 작업일수`
```
=NETWORKDAYS(시작일,끝일,제외할 휴일)
```

`NOW --변경되거나 열릴때 지속적으로 업데이트`

`TODAY --변경되거나 열릴때 지속적으로 업데이트`

`TIME`
```
@RETURN 00:00AM
=TIME(HOUR,MIN,SEC)
```

`DATEVALUE, TIMEVALUE`
```
=DATEVALUE(날짜) #RETURN 일련번호
=TIMEVALUE(시간) #RETURN 일련번호
```

`WEEKDAY`
```
@RETURN 1~7
=WEEKDAY(날짜,{1:일요일시작,2:월요일시작})
```

`WORKDAY --n일 더함/휴무제외`
```
@RETURN 날짜
=WORKDAY(날짜,n,제외할 휴무)
```

`WEEKNUM -몇주 1~54주`
```
=WEEKNUM(날짜)
```

#
## 찾기 참조

`LOOKUP -한행, 한열만 가능/오름차순으로 정렬된 상태에서 가능`
```
=LOOKUP(값,찾을 범위,리턴범위)
```

`CHOOSE --Switch 같은거`
```
=CHOOSE(선택번호,1안,2안,3안)
```
![image](https://user-images.githubusercontent.com/61821641/152639241-6ab54f21-2c3f-4111-a0f5-9c6cbbcf9fa2.png)

`MID --Substring같은거`
```
=MID(C3,8,1)
```
![image](https://user-images.githubusercontent.com/61821641/152639678-83a8bcc2-b03b-405e-af3b-ce44f9290617.png)

`MATCH --찾아서 인덱스 반환`
```
=MATCH(값, 찾을범위, {0:정확, 1: 부정확})
```
![image](https://user-images.githubusercontent.com/61821641/152672266-02ccb89e-874f-40a4-bc2e-c7b79a69a353.png)

`열 번호 매기기`
```
=ROW()-ROW($18:$18) +1
```

`INDEX`
```
=INDEX(범위,행,열) #RETURN 해당 행,열 값
```
`TRANSPOSE`
```
=TRANSPOSE(L15:M22)
```
![image](https://user-images.githubusercontent.com/61821641/152711603-04375501-5dc4-4cde-9155-8ae01df3aa41.png)
#

#
## TEXT
`TEXT` --format해줌
```
=TEXT(원본,FORMAT 문자열)
```
`CONCAT`
```
=CONCAT({이을 문자열})
```
`EXACT 문자열1,2를 대소문자 고려해서 비교`
```
@return true/false
=EXACT(문자열1, 문자열2)
```
`FIND 대소문자 구분`
```
@return int
=FIND(찾는 문자열,어디서 찾을지 문자열)
```
`SEARCH 와일드카드 허용/대소문자 구분없음`
```
@return int 위치 반환
=SEARCH(찾는 문자열, 어디서 찾을지 문자열)
```
`REPLACE`
```
=REPLACE(원본,어디서부터 바꿀지, 몇글자바꿀지,뭘로바꿀지)
```
`SUBSTITUTE`
```
=SUBSTITUTE(원본, 바꿀 텍스트,뭘로 바꿀지 텍스트)
```
`PROPER`
```
@return Proper
=PROPER("PROPER")
```
`TRIM --공백 하나만 남김`
#
## 통계
`MEDIAN`
```
@return 중앙값
=MEDIAN(범위)
```
`LARGE`
```
@return n번째로 큰값
=LARGE(범위,n)
```
`FREQUENCY`
```
영역잡고 > =FREQUENCY(전체영역, 범위영역) > CTRL + SHIFT + ENTER
```
#
## 재무
`FV --적금의 미래가치 함수/개월 단위로 계산해야함`
```
=FV(연이율, 납입기간, -납입액)
```
`PV --연금의 현재가치/개월 단위로 계산해야함`
```
PV(연이율,납입기간,-납입액)
```
`PMT --대출 상환금/개월 단위로 계산해야함`
```
=PMT(연이율, 납입기간, -납입액)
```
#
## 배열 수식

#
## 프로시저
```
Private Sub Cmd입력_Click()
    모델 = Cmd모델.ListIndex
    년식 = Text년식.Value
    등록인 = Text등록인.Value
    등록일 = Text등록일.Value
    신차량가격 = Cells(모델 + 참조_시작행, 참조열)
    
    If 년식.Length > 0 And 등록일 >= 년식 Then
        감가차량가격 = 신차량가격 * 0.8 ^ (등록일 - 년식)
    Else
        감가차량가격 = "등록오류"
    End If

    참조_시작행 = Range("k4").Row
    참조열 = Range("l3").Column

    데이터_시작행 = Range("b4").Row
    데이터_시작열 = Range("b4").Column
    들어간_행개수 = Range("b4").CurrentRegion.Rows.Count
    
    Cells(데이터_시작행 + 들어간_행개수, 데이터_시작열) = 모델
    Cells(데이터_시작행 + 들어간_행개수, 데이터_시작열 + 1) = 년식
    Cells(데이터_시작행 + 들어간_행개수, 데이터_시작열 + 2) = 신차량가격
    Cells(데이터_시작행 + 들어간_행개수, 데이터_시작열 + 3) = 감가차량가격
    Cells(데이터_시작행 + 들어간_행개수, 데이터_시작열 + 4) = 등록일
End Sub
```

#
Refernces
- [](https://exceljet.net/excel-functions)
