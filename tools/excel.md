Excel is SUCK
#
`조건부 서식`

```
=AND(RIGHT($B3,1)="1",LEN($F3)=4)
```

![image](https://user-images.githubusercontent.com/61821641/151926047-8158cc9c-05ae-4ea5-90e5-4c8b60c58263.png)

```
=and(month($A3)=5,$H3>=6,$H3<=12)
```
![image](https://user-images.githubusercontent.com/61821641/151926377-e592a800-4125-411c-96a8-766be471592c.png)

`셀강조`
```
조건부 서식 > 셀 강조 규칙 > 중복값
```
![image](https://user-images.githubusercontent.com/61821641/151927250-51b0fe5a-5f9c-4d91-8fc7-1ef998315a07.png)


`데이터 막대`
```
조건부 서식 > 셀 값을 기준으로 모든 셀의 서식 지정 > 서식 스타일 : 데이터 막대 > 최솟값/최댓값 : 백분위 수 && 채우기 : 그라데이션 
```
![image](https://user-images.githubusercontent.com/61821641/151927153-20feabb6-b1c4-40b7-8a97-abd0978e87e5.png)

`아이콘 집합`
```
조건부 서식 > 셀 값을 기준으로 모든 셀의 서식 지정 > 서식 스타일 : 아이콘 집합
```
![image](https://user-images.githubusercontent.com/61821641/151927934-be8ab711-212f-407d-8c44-00b69f8d0a64.png)

#
`시트 보호`

```
마우스 우클릭 > 셀 서식 > 보호탭에서 숨김 체크 
```

```
마우스 우클릭 > 차트 영역 서식 > 크기 및 속성 탭 > 속성 탭에서 잠금 체크 
```

```
검토탭에서 시트 보호
```
#
`페이지 나누기`
```
기본 탭에서 페이지 나누기 미리보기
```
![image](https://user-images.githubusercontent.com/61821641/151928973-b02d8a6d-b7b3-4476-bee5-8afc6deb9c00.png)

#
`인쇄`

인쇄 영역 설정
```
페이지 레이아웃 탭 > 페이지 설정 > 시트 탭에서 설정
```

인쇄 영역 추가
```
페이지 레이아웃 탭 > 인쇄 영역 > 인쇄 영역 추가
```


반복할 행 설정
```
페이지 레이아웃 탭 > 페이지 설정 > 시트 탭에서 반복할 행
```

머릿글 바닷글 설정
```
페이지 레이아웃 탭 > 페이지 설정 > 머릿글 바닥글 탭에서 추가
```
![image](https://user-images.githubusercontent.com/61821641/151929677-5f07b03d-a62e-4a6f-b8f3-1fa4ce57349c.png)

![image](https://user-images.githubusercontent.com/61821641/151930452-76d53172-292b-4239-851c-cf3f3745fecf.png)

가로세로 맞춤
```
파일 > 인쇄 > 페이지 설정 > 여백
```
#
`외부 데이터 가져오기`
```
데이터 > 외부 데이터 가져오기 탭에서 기타 원본에서 > Microsoft Query에서 > MS Access Database
```
![image](https://user-images.githubusercontent.com/61821641/152106095-6a9e6967-e75f-4fcd-9f86-8c03f51ba8db.png)

![image](https://user-images.githubusercontent.com/61821641/152106516-06e56398-2234-4961-aa1b-b98f705fa82b.png)
#
`계산작업`

```
판매금액 * 마진율
=$C3 * $C$9
```
![image](https://user-images.githubusercontent.com/61821641/152107866-2f336efc-6cc2-4f4f-9d7f-193d442931c0.png)

```
누적인원수 / 총인원수
=$H3 / $G$8
```
![image](https://user-images.githubusercontent.com/61821641/152108023-ee4c5fae-4699-43ea-8faf-b5dbfdb9ada7.png)

```
기본급 + 기본급 * (상여비율 + 추가 상여율)
=$C13 + $C13*($D13+$C$18)
```
![image](https://user-images.githubusercontent.com/61821641/152108232-ff0801d5-b853-48d2-9b4f-0bed40ad6ee6.png)

```
판매량 * 단가 * (1 - 할인율)
=H12*$G$20*(1-$H$20)
```
![image](https://user-images.githubusercontent.com/61821641/152108520-d4353809-0ac8-421a-9bcf-6044c017c311.png)

```
대출권수 * 대출 포인트 + 연체권수 * 연체 포인트
=(B22*$C$28)+(C22*$C$29)
```
![image](https://user-images.githubusercontent.com/61821641/152108885-73016564-c97a-4c10-9ce7-4a9b43b72cff.png)

`AVERAGEIF`
```
#조건범위,조건,계산범위
=AVERAGEIF($D$4:$D$43,L7,$G$4:$G$43)
```

#
## 통계

`표준편차`
```
=ROUNDDOWN(STDEV(D29:D38),1)
```
`세번째로 큰값`
```
=LARGE(I29:I38,3)
```
`숫자가 아닌 데이터의 갯수`
```
=COUNTA(B16:E16)
```
![image](https://user-images.githubusercontent.com/61821641/152639145-45dc6549-d683-44ba-b78f-1557617b23ee.png)

`SMALL` 
```
=IF(J16<=SMALL($J$16:$J$24,3),"입상","")
```
![image](https://user-images.githubusercontent.com/61821641/152639398-a90533a8-e6d6-4896-8a79-e2f1c06dd56e.png)

`공백 count`
```
=COUNTBLANK(I28:K34)
```
![image](https://user-images.githubusercontent.com/61821641/152639464-39c05d8a-dae8-404a-826f-05be81c970ab.png)

#
## 찾기

`Switch 같은거`
```
=CHOOSE(COUNTA(B16:E16),"25%","50%","75%","100%")
```
![image](https://user-images.githubusercontent.com/61821641/152639241-6ab54f21-2c3f-4111-a0f5-9c6cbbcf9fa2.png)

`Substring같은거`
```
=MID(C3,8,1)
```
![image](https://user-images.githubusercontent.com/61821641/152639678-83a8bcc2-b03b-405e-af3b-ce44f9290617.png)

C3의 왼쪽 1번째 글자까지
```
=LEFT(C3,1)
```

`찾아서 인덱스 반환`
```
=MATCH(A14,B25:D25,0)
```
![image](https://user-images.githubusercontent.com/61821641/152672266-02ccb89e-874f-40a4-bc2e-c7b79a69a353.png)

`Join문 같은거`
```
=VLOOKUP(H3,$K$7:$L$10,2,TRUE)
```
![image](https://user-images.githubusercontent.com/61821641/152672108-487769b2-e426-4f03-8c2c-aaeab6992b31.png)

```
=HLOOKUP(A14,$B$25:$D$27,3,FALSE)
=INDEX($B$26:$D$27,2,MATCH(A14,$B$25:$D$25,0))
```
![image](https://user-images.githubusercontent.com/61821641/152672309-cfbfff34-88e0-41c6-8adf-aa27031a48a9.png)

`열 번호 매기기`
```
=ROW()-ROW($18:$18) +1
```
![image](https://user-images.githubusercontent.com/61821641/152672928-82d48783-d21c-42cf-a795-ede88e31b224.png)
#
`필터`

```
표에 커서 > 데이터 탭에서 고급 > 조건 범위, 복사 위치 지정
```
조건범위
```
=AND(G3<>"서울",E3>AVERAGE($E$3:$E$36),F3<500)
```
![image](https://user-images.githubusercontent.com/61821641/152674611-b2dfda32-95d3-4bfe-884d-6cfad63303b6.png)
#
`사용자 정의 함수`

개발도구 탭이 없을 때
```
파일 > 옵션 > 리본사용자 지정 > 개발도구 추가
```
```
개발도구 > Visual Basic
```
#
`피벗테이블`
```
데이터 > 기타 원본에서 > MS Access Database 
```

```
삽입 > 피벗테이블 > 외부 데이터
```
#
`데이터 유효성 검사`
```
데이터 > 데이터 유효성 검사
```
#
`중복 제거`
```
범위 설정 > 데이터 > 중복항목제거
```