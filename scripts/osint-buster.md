buster --이메일 정찰
#
`install`

git clone(회사 이메일을 검색하려면 api key가 필요함)
```
git clone git://github.com/sham00n/buster
```
setup.py 파일을 실행하여 필수 요구 사항을 설치
```
cd buster
sudo python3 setup.py install
```
#
`실행`
```
buster --help
```
혹시 에러가 난다면
```
pip3 install --force-reinstall zope.event
```
`email 주소 찾기`
```
buster -e <email address>
```
![image](https://user-images.githubusercontent.com/61821641/150195024-22a9e0af-e024-450f-ae1f-ad58854cbe12.png)

`패턴과 일치하는 이메일 생성 및 존재 여부 확인`
```
buster -e j********9@g****.com -f john -l doe -b ****1989
```
![image](https://user-images.githubusercontent.com/61821641/150195579-946fc89e-2281-482e-ad1b-1ed542298773.png)

`유효한 사용자 이름 생성`
```
buster -f gaurav -m gdg -l gandal -b 14052001
```
![image](https://user-images.githubusercontent.com/61821641/150195977-ed712c98-c042-4ea7-be50-b1f8125dbf16.png)
#
reference
- [geeksforgeeks](https://www.geeksforgeeks.org/buster-an-advanced-tool-for-email-reconnaissance/?ref=gcse)