steghied
#
`이미지/오디오 내부에 데이터 숨기기`
```
steghide embed -ef <text file> -cf <image or audio file>
```
#
`이미지/오디오 내부에 비밀 파일을 검색`
```
steghide extract -sf <image or audio file>
```
#
`이미지/오디오 파일에서 추출하기 전 정보`
```
steghide info <image or audio file>
```
#
`압축모드` (level: 0~9)
```
steghide embed -ef <text file> -cf <image or audio file> -z <level>
```
#
`암호`
```
steghide embed -ef <text file> -cf <image or audio file> -e <algorithms name>
```
`호환 암호 알고리즘 검색`
```
steghide --encinfo
```
#
reference
- [tutorial](https://ashraful004.medium.com/steghide-a-beginners-tutorial-35ec0ea90446)