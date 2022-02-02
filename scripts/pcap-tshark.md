🦈tshark
#
`packet count`
```
tshark -r <pcap file> | wc -l
```
![image](https://user-images.githubusercontent.com/61821641/152068894-75c85527-5516-4842-ae7b-9fb14aec248c.png)
#
`dns A 레코드`
```
tshark -r <pcap file> -Y "dns.qry.type == 1"
```
![image](https://user-images.githubusercontent.com/61821641/152069005-29ea4b8c-f049-4a6d-8e10-7ebdede624bf.png)
![image](https://user-images.githubusercontent.com/61821641/152069072-1a652a1a-1f12-48f8-bd9c-9d5b69a75700.png)

`fields`
```
tshark -r <pcap file> -Y "dns.qry.type == 1" -T fields -e dns.qry.name
```
![image](https://user-images.githubusercontent.com/61821641/152069177-31e1824e-d8ba-42c0-93c2-944e8b463c48.png)
```
tshark -r <pcap file> -Y "dns.flags.response == 0" -T fields -e dns.id
```
![image](https://user-images.githubusercontent.com/61821641/152069371-2fff3a20-de92-4bdf-8e14-bb7e550054e3.png)
#
`dns query만 검색`
```
tshark -r <pcap file> -Y "dns.flags.response == 0" | wc -l
```
![image](https://user-images.githubusercontent.com/61821641/152068601-3dec8c2e-704e-420e-b939-94da1ff79bf9.png)

#

```
tshark -r dnsexfil.pcap -Y "dns.flags.response == 0"
```
![image](https://user-images.githubusercontent.com/61821641/152070466-ec9b9aed-ab6b-4987-86fe-8e4b5bc19c87.png)
```
tshark -r dnsexfil.pcap -Y "dns.flags.response == 0" -T fields -e dns.qry.name | cut -d "." -f1 | tr -d "\n"
```
![image](https://user-images.githubusercontent.com/61821641/152070515-6d920ad7-87a3-4952-93a9-53bb1286294c.png)