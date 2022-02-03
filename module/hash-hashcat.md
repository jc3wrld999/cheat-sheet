hashcat
#
```
echo '2cb42f8734ea607eefed3b70af13bbd3' > hash 
```
```
hashcat -a 0 -m 0 hash /usr/share/wordlists/rockyou.txt
```

![image](https://user-images.githubusercontent.com/61821641/150565702-effc5f9d-b8c1-455e-806c-5e3fceb6a98b.png)

#
1. hashid

![image](https://user-images.githubusercontent.com/61821641/151177944-6f815df4-12be-4a8a-b026-898ced27a634.png)

2. [hash wiki 에서 mode number 찾기](https://hashcat.net/wiki/doku.php?id=example_hashes)

![image](https://user-images.githubusercontent.com/61821641/151178085-e29a4dfb-5e79-4e89-9337-5b3ab79c5b0a.png)

3. 
```
hashcat -a 0 -m 1400 hash1 /usr/share/wordlists/rockyou.txt
```