# ๐ฆ
![image](https://user-images.githubusercontent.com/61821641/147723542-912d98d1-6ce1-4d85-81d1-bdde0ad70c91.png)
#
`PcapNg์์ pcap์ผ๋ก ๋ณํ`
```
editcap -F libpcap <pcapng file> <๋ฐ๊ฟ pcap ์ด๋ฆ>
```
#
`ํ์ผ ๋ถํ `
- ํ์ผ์ด ๋๋ฌด ์ปค์ ๋ถํ ํด์ผ ํ ๋
```
editcap -c 100000 test.pcap test
```
- `test_(๋ฒํธ)`ํ์์ผ๋ก ๋ถํ ๋ ํจํท ์บก์ฒ ํ์ผ์ด ๋ง๋ค์ด์ง
- 100000๊ฐ ๋จ์๋ก ๋ถํ 
#
`pcap, PcapNg ํ์ผ ๋ณต๊ตฌ`
- pcapfix
- ๋ฐ์ด๋๋ฆฌ ์๋ํฐ๋ก pcap ํ์ผ์ ์ด์ด ํ์ผ ํ์์ ์ฐธ์กฐํด๊ฐ๋ฉฐ ์ง์  ๋ฐ์ด๋๋ฆฌ์์ ์๋ฌ๊ฐ ๋ฐ์ํ๋ ๋ถ๋ถ์ ์์ 
#
`ํจํท ํ์ ํ๋ฉด`

![image](https://user-images.githubusercontent.com/61821641/155912486-b9e0efe7-5d06-4b52-9034-874160d39282.png)

1. ํจํท๋ชฉ๋ก

![image](https://user-images.githubusercontent.com/61821641/155912537-6b5deff4-e73b-422c-9af6-4e98802c134d.png)

- ํจํท์ ๋ฒํธ, ์๊ฐ, ์ถ๋ฐ์ง ์ฃผ์, ๋ชฉ์ ์ง ์ฃผ์, ์ฌ์ฉํ ํ๋กํ ์ฝ, ํจํท ๋ด์ฉ

2. ์์ธ ํจํท ๋ด์ฉ

![image](https://user-images.githubusercontent.com/61821641/155912661-e3af46be-3afe-456e-aaad-a76cba23c1fc.png)

- ๊ฐ ํจํท์ ํ๋กํ ์ฝ ๊ธฐ๋ฐ์ผ๋ก ๋ถ์ํด์ ๊ฐ ํ๋กํ ์ฝ ํค๋์ ํ๋ ๊ฐ๊ณผ ๋ฐ์ดํฐ๋ฅผ ๋ณผ ์ ์์

3. ์์ ํจํท

![image](https://user-images.githubusercontent.com/61821641/155912774-dee29675-c4b2-478e-93f0-fa29fbc53611.png)

- ์ด๊ธฐ ์ํ๋ ํ๋ฉด์ ์ผ์ชฝ์ 16์ง์ ํ๊ธฐ๋ก ํ์๋๊ณ  ์ค๋ฅธ์ชฝ์ ์ธ์๊ฐ๋ฅํ ASCII ์ฝ๋๋ก ํ์ํด์ค
- ASCII์ฝ๋ ๋ถ๋ถ์ HTTP๋ Telnet๊ณผ ๊ฐ์ด ์ํธํ๋์ง ์์ ํ์คํธ ๊ธฐ๋ฐ ํ๋กํ ์ฝ์ด๋ผ๋ฉด ์ฝ์ ์ ์์
#
`Navigation > Statics`

- Conversations

![image](https://user-images.githubusercontent.com/61821641/155915016-a2a1a930-c726-427c-a0d8-29767ac1ad05.png)

- ipv4ํญ
    - ip์ฃผ์ ๋ชฉ๋ก์ ํ์ธํ  ์ ์์
    - Address A, B๋ฅผ ํด๋ฆญํ์ฌ ์ ๋ ฌํด์ ๋ณด๋ฉด ์ข ๋ ์ฝ๊ฒ ip๋ฅผ ์ฐพ์ ์ ์์

![image](https://user-images.githubusercontent.com/61821641/155921028-21f5b59c-6d9c-4424-bf34-81e5b8cc5209.png)

- tcp ํญ
    - ์ผ๋ฐ์ ์ผ๋ก ์ฌ์ฉํ์ง ์๋ ํฌํธ(http์ธ๋ฐ 80์ด์๋)๋ก ํต์ ํด๋ ์์ด์ด์คํฌ๋ ์ธ์ํ์ง ๋ชปํ๋ค. ์ด๋ด ๋ tcp ํญ์์ ์ด๋ ip ์ฃผ์์ ์ด๋ tcp ํฌํธ๊ฐ ํต์ ํ๋์ง ํ์ธํ  ์ ์๋ค.
    - Packets๋ก ์ ๋ ฌํ๋ฉด ํจํทํฌ๊ธฐ๋ก ์ ๋ ฌ๋๊ณ  ํธ๋ํฝ์์ด ์ ์์ง ๊ทน๋จ์ ์ผ๋ก ๋ง์์ง ์ฝ๊ฒ ์ ์ ์์
- Protocol Hierarchy

![image](https://user-images.githubusercontent.com/61821641/155920741-5d32a1c2-e577-4769-93c8-ae748c9dff65.png)

-
    - ํจํท์์ ์ฌ์ฉ๋ ํ๋กํ ์ฝ ๋ด์ฉ์ด ํ์๋จ
    - ์ฌ๊ธฐ์ ์ํธํ๋์ง ์์ ํ๋กํ ์ฝ(http, ftp, smtp, telnet)๊ฐ์ ํต์ ์ด ํฌํจ๋ผ์๋์ง ํ์ธ
#
`ํํฐ๋ง`

```
[ํ๋กํ ์ฝ๋ช].[ํ๋กํ ์ฝ ํ๋๋ช] [์ฐ์ฐ์] [๊ฐ]
```
- ํ๋กํ ์ฝ๋ช
    - ip
    - icmp
    - tcp
    - udp
    - http
- ํ๋
    - ip.addr(ip์ฃผ์)
    - ip.src(์ถ๋ฐ์ง ip์ฃผ์)
    - ip.dst(๋ชฉ์ ์ง ip์ฃผ์)
    - tcp.port(tcp ํฌํธ)
    - tcp.sport(tcp ์ถ๋ฐ์ง ํฌํธ)
    - tcp.dport(tcp ๋ชฉ์ ์ง ํฌํธ)
    - tcp.flags(tcp ํ๋๊ทธ)
    - http.request(http ์์ฒญ)
    - http.request.method(http ์์ฒญ ๋ฉ์๋)
    - http.response(http ์๋ต)
    - http.response.code(http ์๋ต ์ฝ๋)
- ๋น๊ต ์ฐ์ฐ์
    - eq(==)
    - ne(!=)
    - gt(>)
    - lt(<)
    - ge(>=)
    - le(<=)
- ๋ผ๋ฆฌ ์ฐ์ฐ์
    - and(&&)
    - or(||)
    - not(!)

ex) 133.242.227.80์ด๋ผ๋ ip์ฃผ์์์ tcp ํฌํธ 80๋ฒ์ ์ฌ์ฉํ๋ ํจํท๋ง ํ์
```
ip.addr == 133.242.227.80 && tcp.port ==80
```

#
`Follow TCP(UDP) Stream`

![image](https://user-images.githubusercontent.com/61821641/155923228-11def137-0553-4586-95a7-b281a6ea4206.png)

#
`Export`

`ํํฐ๋งํ ํจํท ์ ์ฅ`

File > Export Specified Packets > Displayed ์ ํ

![image](https://user-images.githubusercontent.com/61821641/155922653-c46ff01b-d7b5-478c-9b8c-c96ebd5d9ed8.png)

`HTTP ํจํท์์ ์ถ์ถ`

![image](https://user-images.githubusercontent.com/61821641/155923257-47fae365-e2a2-4784-8f18-2adad4f1a9ba.png)

`ํจํท์ ์ผ๋ถ๋ฅผ ๋ฐ์ด๋๋ฆฌ ํ์ผ๋ก ์ ์ฅ`
- ์ํ๋ ํจํท์ ์ ํํ ํ ํ๋จ์ ํจํท ๋ํ์ผ ์ฐฝ์์ ๋ง์ฐ์ค ์ฐํด๋ฆญํ์ฌ `Export Packet Bytes`

![image](https://user-images.githubusercontent.com/61821641/155923518-5215a45c-a6d4-4c88-9e93-e42fd2e357ad.png)
#
References
- [Sample Capture](https://wiki.wireshark.org/SampleCaptures)
