Access
#
매크로/프로시저

`새 레코드 추가`
```
DoCmd.GoToRecord acDataForm, "폼이름", acNewRec
```

`정보표시`
```
Me.RecordsetClone.FindFirst "필드명 like '" & cmb필드명 & "'"
Me.Bookmark = Me.RecordsetClone.Bookmark
```

`레코드 조회`
```
Me.RecordSource = "select * from 레코드원본 where 필드명 like '" & cmb필드명 & "'"
```

`Filter`
```
#문자
Me.Filter= "필드명 = '" & cmb필드명 & "'"
#숫자
Me.Filter= "필드명 = " & cmb필드명 
#날짜
Me.Filter= "필드명 = #" & cmb필드명 & "#"

Me.FilterOn = true
```

`정렬`
```
Me.OrderBy = "필드명 desc"
Me.OrderByOn = true
```

`focus`
```
필드명.SetFocus
Docmd.gotoControl
```

`Open`
```
DoCmd.OpenForm "폼이름"
DoCmd.OpenRecord "보고서이름", acViewPreview , ,조건

```

`Close`
```
DoCmd.Close
DoCmd.Close acForm, "폼이름", 저장 여부
```

`SQL`
```
DoCmd.RunSQL ""
DoCmd.Requery
```

`MsgBox`
```
MsgBox "내용", 유형, "제목"
i = MsgBox("내용", 유형, "제목")
if i = vbYes then
    조건
else
    조건
end if
```
![image](https://user-images.githubusercontent.com/61821641/153757359-9d2f95c3-7eaa-41b3-8108-3568a4513ffe.png)
