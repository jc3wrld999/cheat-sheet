john the ripper

#
`zip file crack`

```
zip2john <file name> > <output>
```
![image](https://user-images.githubusercontent.com/61821641/150439911-9d89b4d3-2c76-4511-b185-4f198dea63c6.png)

![image](https://user-images.githubusercontent.com/61821641/150439987-5117a8c1-eeee-4fe2-95d7-ddc707478ac0.png)

```
john --wordlist=/usr/share/wordlists/rockyou.txt hashes
```

![image](https://user-images.githubusercontent.com/61821641/150440151-b23b899b-2647-4a1f-8b87-36f13021235d.png)

![image](https://user-images.githubusercontent.com/61821641/150983634-742c34c6-8b1f-4249-a25f-e38bcd4c861d.png)

#
`Jumbo`

setup
```
git clone https://github.com/magnumripper/JohnTheRipper.git
cd ./JohnTheRipper/src
sudo apt-get update
sudo apt-get install libssl-dev
cd ./JohnTheRipper/src
./configure && make
```
```
ls
```
![image](https://user-images.githubusercontent.com/61821641/151736802-c1fdc24b-9d9e-4e46-b0da-6a2d66e434ff.png)

`pdf2john`
```
./pdf2john.pl <pdf file path> /root/Downloads/idk/pdf.hash
john /root/Downloads/idk/pdf.hash
```


