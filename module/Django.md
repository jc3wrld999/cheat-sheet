Django
#
`set up`
```
pip3 install Django==2.2.12
```
#
`create project`

```
django-admin startproject <project-name>
cd <project-name> 
python3 manage.py migrate
```
`python3 manage.py migrate`는 새파일을 자동으로 구성

```
python3 manage.py runserver
```
만약 에러가 나면 settings.py에 
```
ALLOWED_HOSTS = ['0.0.0.0', '127.0.0.1']
```
![image](https://user-images.githubusercontent.com/61821641/154323100-3dfffaba-284e-4ef1-ad94-5e99b5261425.png)

참고: 로컬 네트워크에서 서버를 실행하려면 runserver 명령 뒤에 0.0.0.0:8000 을 추가
#
`수퍼유저 생성`
```
python3 manage.py createsuperuser
```
127.0.0.1:8000/admin에 접속
#
`app 만들기`
```
python3 manage.py startapp {app_name}
```
Startapp을 사용하면 프로젝트의 앱을 초기화할 수 있습니다. Django 프로젝트에는 무한한 수의 앱이 있을 수 있습니다. 

settings.py에서 app_name을 추가해줍니다. `<app name>.apps.<class name>`  형식으로 새 앱을 포함해야 합니다

![image](https://user-images.githubusercontent.com/61821641/154331099-23af6750-f7f4-43c4-838d-ef60d040efff.png)
![image](https://user-images.githubusercontent.com/61821641/154331249-5e08b92b-830c-4abf-8d34-4ff94769fe52.png)

![image](https://user-images.githubusercontent.com/61821641/154331534-f2724dd0-fb99-454a-9568-32c7a010b17f.png)
