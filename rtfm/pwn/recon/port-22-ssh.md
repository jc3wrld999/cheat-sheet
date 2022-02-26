SSH
#
## 1. Recon

```
nc <rhost> 22
```
![image](https://user-images.githubusercontent.com/61821641/152290150-4a6b0461-7c8d-4524-acfc-d3383fa3a613.png)

#
[Debian SSH](https://github.com/g0tmi1k/debian-ssh)

/debian-ssh/common_keys
```
tar jxf debian_ssh_rsa_2048_x86.tar.bz2
```

아래 주어진 공개키와 일치하는 개인키 찾기
```
ssh-rsa AAAAB3NzaC1yc2EAAAABIwAAAQEApmGJFZNl0ibMNALQx7M6sGGoi4KNmj6PVxpbpG70lShHQqldJkcteZZdPFSbW76IUiPR0Oh+WBV0x1c6iPL/0zUYFHyFKAz1e6/5teoweG1jr2qOffdomVhvXXvSjGaSFwwOYB8R0QxsOWWTQTYSeBa66X6e777GVkHCDLYgZSo8wWr5JXln/Tw7XotowHr8FEGvw2zW1krU3Zo9Bzp0e0ac2U+qUGIzIu/WwgztLZs5/D9IyhtRWocyQPE+kcP+Jz2mt4y1uA73KqoXfdw5oGUkxdFo9f1nu2OwkjOc+Wv8Vw7bwkf+1RgiOMgiJ5cCs4WocyVxsXovcNnbALTp3w== msfadmin@metasploitable
```
![image](https://user-images.githubusercontent.com/61821641/152297571-5dd97d7e-f228-4b7c-b53c-914a70c7f6d9.png)
![image](https://user-images.githubusercontent.com/61821641/152298162-e1810cca-5bbe-41bf-845d-d08505464657.png)