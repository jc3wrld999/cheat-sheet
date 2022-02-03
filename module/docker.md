# 🐋
`setup`
```
apt-get update
apt-get install docker.io
docker version
```
#
`image 설치`

```
docker search centos
docker pull centos:latest
docker image inspect centos
```
#
`run`
```
systemctl start docker
```
```
docker run -it --network host centos
docker run -itd --name centos1 centos
```
```
docker start <container name>
```
#
`web server 구성`
```
docker search httpd
docker pull httpd  
docker run -d --name httpd-t -p 80:80 httpd
```

#
`man`

`container`
| **명령어** | **설명** |
| --- | --- |
| **docker** | 제대로 설치되었는지 확인 |
| **docker version** | 도커 버전 확인 |
| **docker system info** | 도커 시스템 정보 확인 |
| **docker system df** | 도커 디스크 용량 확인 |
| **docker ps** | 실행중인 컨테이너 확인 |
| **docker ps -a** | 전체 컨테이너 확인 |
| **docker (container) inspect 컨테이너명\|ID** | 컨테이너 상세 정보 확인 |
| **docker rm 컨테이너명\|ID** | 컨테이너 삭제 |
| **docker rm --force 컨테이너명\|ID** | 컨테이너 강제 삭제 |
| **docker (container) run \[옵션\] 이미지 \[커맨드\] \[ARG…\]** | 컨테이너 생성과 동시에 실행 |
| **docker start 컨테이너** | 컨테이너 실행 |
| **docker stop 컨테이너** | 컨테이너 종료 |
| **docker attach 컨테이너** | 컨테이너 접속 |
| **docker exec \[옵션\] 컨테이너 커맨드 \[ARG…\]** | 컨테이너 명령 실행 |
| **docker commit \[옵션\] 컨테이너 \[저장소\[:태그\]\]** | 컨테이너를 이미지로 저장 |

| **옵션** | **설명** |
| --- | --- |
| **\--name 이름** | 컨테이너명 설정 옵션 |
| **\--detach(-d)** | 컨테이너를 백그라운드에서 실행 |
| **\--interactive(-i)** |            접속이 없어도 표준 입력 허용 |
| **\--tty(-t)** | 터미널(pty) 할당 |
|     **\--publish(-p)** | port 설정   로컬 OS의 port **:** 컨테이너의 port 순으로작성   예) -p 8080:80 |

#
`dockerfile`

| **명령어** | **설명** |
| --- | --- |
| **docker build \[옵션\] 경로\|URL\| -** | 도커 파일을 실행하여 이미지로 생성 |    

| **옵션** | **설명** |
| --- | --- |
| **\--file(-f)** | 파일명 설정 옵션(기본은 Dockerfile) |
| **\--tag(-t)** | 이름 혹은 이름:태그 지정 |

| **문법** | **설명** |
| --- | --- |
| **FROM** | 이미지 지정 |
| **RUN** | 이미지 내부에서 실행할 명령어 |
| **WORKDIR** | 이미지 내부에 디렉터리 생성, 이동 |
| **COPY** | 로컬 환경의 파일을 이미지 내부로 복사 |
| **EXPOSE** | 사용할 port번호 지정 |
| **CMD** | 컨테이너가 실행될 때 실행될 내용   docker run 사용 시 default 명령어를 지정 |