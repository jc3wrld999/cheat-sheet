Wordhound
#
`set up`
```
git clone https://bitbucket.org/mattinfosec/wordhound.git /opt/wordhound/
apt-get install python-setuptools
cd /opt/wordhound && python setup.py install && ./setup.sh
```

tweepy 수동설치
```
pip install -U pip
git clone https://github.com/tweepy/tweepy.git /opt/tweepy
cd /opt/tweepy
python3 ./setup.py install
```