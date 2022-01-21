steghied
#
`호환`

- JPEG, JPG, GIF, BMP(PNG는 안됨)/ WAV, AU(오디오)
#
`module`
```
embed       --파일 내부에 데이터를 숨김
extract     --이미지에서 비밀 파일을 검색
info        --데이터를 추출하기 전 정보 확인
```
`options`
```
-cf         --표지 파일, 내부에 숨기는데 사용할 이미지 파일
-ef         --다른 파일안에 숨길 파일
-sf         --비밀 메세지가 있는 파일 지정
-z          --압축모드. 메모리를 절약하지만 실수로 전체 파일을 손상시킬 수 있음(1~9: 1이 가장 낮은 수준의 압축)
-e          --사용할 암호화 알고리즘 이름
```
`help`
```
--encinfo   --호환되는 모든 알고리즘 나열
```
#
reference
- [tutorial](https://ashraful004.medium.com/steghide-a-beginners-tutorial-35ec0ea90446)