kerbrut
#
`setup`

[kerburte_linux_amd64 download](https://github.com/ropnop/kerbrute/releases)

```
chmod +x kerburte_linux_amd64 
./kerburte_linux_amd64
```
#
/etc/hosts 에 target ip 추가

![image](https://user-images.githubusercontent.com/61821641/152098361-e1b67de7-9172-47b1-96d7-4e4df7a5fbed.png)

```
./kerbrute userenum --dc CONTROLLER.local -d CONTROLLER.local User.txt
```
![image](https://user-images.githubusercontent.com/61821641/152098476-f00bb095-f7d3-42eb-980f-eb2dcfddad34.png)