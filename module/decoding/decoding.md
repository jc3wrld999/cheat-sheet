decoding
#
`base64`

```
echo 'VEhNe1lPVV9XT1JLRURfT1VUX1RIRV9TU1JGfQ==' | base64 --decode
```

#
`ASCII`

1. python
```
python3
bytes.fromhex('디코딩할 16진수').decode('utf8')
```


#
`10진수`

1. python
```
python3
string = '16진수'
decode = int(string, 16)
print(decode)
```
