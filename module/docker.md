# π
`setup`
```
apt-get update
apt-get install docker.io
docker version
```
#
`image μ€μΉ`

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
`web server κ΅¬μ±`
```
docker search httpd
docker pull httpd  
docker run -d --name httpd-t -p 80:80 httpd
```

#
`man`

`container`
| **λͺλ Ήμ΄** | **μ€λͺ** |
| --- | --- |
| **docker** | μ λλ‘ μ€μΉλμλμ§ νμΈ |
| **docker version** | λμ»€ λ²μ  νμΈ |
| **docker system info** | λμ»€ μμ€ν μ λ³΄ νμΈ |
| **docker system df** | λμ»€ λμ€ν¬ μ©λ νμΈ |
| **docker ps** | μ€νμ€μΈ μ»¨νμ΄λ νμΈ |
| **docker ps -a** | μ μ²΄ μ»¨νμ΄λ νμΈ |
| **docker (container) inspect μ»¨νμ΄λλͺ\|ID** | μ»¨νμ΄λ μμΈ μ λ³΄ νμΈ |
| **docker rm μ»¨νμ΄λλͺ\|ID** | μ»¨νμ΄λ μ­μ  |
| **docker rm --force μ»¨νμ΄λλͺ\|ID** | μ»¨νμ΄λ κ°μ  μ­μ  |
| **docker (container) run \[μ΅μ\] μ΄λ―Έμ§ \[μ»€λ§¨λ\] \[ARGβ¦\]** | μ»¨νμ΄λ μμ±κ³Ό λμμ μ€ν |
| **docker start μ»¨νμ΄λ** | μ»¨νμ΄λ μ€ν |
| **docker stop μ»¨νμ΄λ** | μ»¨νμ΄λ μ’λ£ |
| **docker attach μ»¨νμ΄λ** | μ»¨νμ΄λ μ μ |
| **docker exec \[μ΅μ\] μ»¨νμ΄λ μ»€λ§¨λ \[ARGβ¦\]** | μ»¨νμ΄λ λͺλ Ή μ€ν |
| **docker commit \[μ΅μ\] μ»¨νμ΄λ \[μ μ₯μ\[:νκ·Έ\]\]** | μ»¨νμ΄λλ₯Ό μ΄λ―Έμ§λ‘ μ μ₯ |

| **μ΅μ** | **μ€λͺ** |
| --- | --- |
| **\--name μ΄λ¦** | μ»¨νμ΄λλͺ μ€μ  μ΅μ |
| **\--detach(-d)** | μ»¨νμ΄λλ₯Ό λ°±κ·ΈλΌμ΄λμμ μ€ν |
| **\--interactive(-i)** | Β Β Β Β Β Β Β Β Β Β  μ μμ΄ μμ΄λ νμ€ μλ ₯ νμ© |
| **\--tty(-t)** | ν°λ―Έλ(pty) ν λΉ |
| Β    **\--publish(-p)** | port μ€μ    λ‘μ»¬ OSμ port **:** μ»¨νμ΄λμ port μμΌλ‘μμ±   μ) -p 8080:80 |

#
`dockerfile`

| **λͺλ Ήμ΄** | **μ€λͺ** |
| --- | --- |
| **docker build \[μ΅μ\] κ²½λ‘\|URL\| -** | λμ»€ νμΌμ μ€ννμ¬ μ΄λ―Έμ§λ‘ μμ± |    

| **μ΅μ** | **μ€λͺ** |
| --- | --- |
| **\--file(-f)** | νμΌλͺ μ€μ  μ΅μ(κΈ°λ³Έμ Dockerfile) |
| **\--tag(-t)** | μ΄λ¦ νΉμ μ΄λ¦:νκ·Έ μ§μ  |

| **λ¬Έλ²** | **μ€λͺ** |
| --- | --- |
| **FROM** | μ΄λ―Έμ§ μ§μ  |
| **RUN** | μ΄λ―Έμ§ λ΄λΆμμ μ€νν  λͺλ Ήμ΄ |
| **WORKDIR** | μ΄λ―Έμ§ λ΄λΆμ λλ ν°λ¦¬ μμ±, μ΄λ |
| **COPY** | λ‘μ»¬ νκ²½μ νμΌμ μ΄λ―Έμ§ λ΄λΆλ‘ λ³΅μ¬ |
| **EXPOSE** | μ¬μ©ν  portλ²νΈ μ§μ  |
| **CMD** | μ»¨νμ΄λκ° μ€νλ  λ μ€νλ  λ΄μ©   docker run μ¬μ© μ default λͺλ Ήμ΄λ₯Ό μ§μ  |