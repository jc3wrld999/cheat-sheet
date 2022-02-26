email2phonenumber --email주소로 상대방 전화번호를 얻는 OSINT 도구
#
`install`
```
git clone https://github.com/martinvigo/email2phonenumber.git
```
종속성 설치
```
cd email2phonenumber
sudo pip3 install -r requirements.txt
```
[에러나면](https://pip.pypa.io/en/latest/user_guide/#fixing-conflicting-dependencies)
```
python3 -m pip freeze > requirements.txt
python3 -m pip install -r requirements.txt
```
#
`help`
```
python3 email2phonenumber.py -h
```
`recon by email`
```
python3 email2phonenumber.py scrape -e victimusa@martinvigo.com
```
`얻은 마스크 정보로 전화번호 사전 만들기`
```
python3 email2phonenumber.py generate -m 415XXX8826
```
`만든 사전으로 bruteforce`
```
python3 email2phonenumber.py bruteforce -evictimusa@martinvigo.com -m 41530×8826 -v
```
#
`웹사이트에서 전화번호 자릿수 crack`
```
python3 email2phonenumber.py scrape -e victimusa@martinvigo.com
```
#
reference
- [geeksforgeeks](https://www.geeksforgeeks.org/email2phonenumber-osint-tool-to-obtain-a-targets-phone-number-by-email-address/?ref=gcse)