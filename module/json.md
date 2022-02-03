json
#
`json parser`
install
```
sudo apt-get install jq
```

```
curl -s http://api.open-notify.org/iss-now.json
```

```
curl -s http://api.open-notify.org/iss-now.json | jq . > iss.json
cat iss.json
```