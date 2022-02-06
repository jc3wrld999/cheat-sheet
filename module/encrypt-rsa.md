RSA

#
`setup`

[RsaCtfTool](https://github.com/Ganapati/RsaCtfTool)

```
git clone https://github.com/Ganapati/RsaCtfTool.git
sudo dnf install gcc python3-devel python3-pip python3-wheel gmp-devel mpfr-devel libmpc-devel
cd RsaCtfTool
pip3 install -r "requirements.txt"
python3 RsaCtfTool.py
pip uninstall pycrypto
pip install pycryptodome
```
#
```
rsactftool --publickey key.pub --uncipherfile flag.enc 
```
![image](https://user-images.githubusercontent.com/61821641/152666041-e97c77eb-b83a-4b25-93ea-6ef68ea80705.png)
