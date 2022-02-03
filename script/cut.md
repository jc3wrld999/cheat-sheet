cut
#
```
tshark -r dnsexfil.pcap -Y "dns.flags.response == 0"
```
![image](https://user-images.githubusercontent.com/61821641/152070466-ec9b9aed-ab6b-4987-86fe-8e4b5bc19c87.png)
```
tshark -r dnsexfil.pcap -Y "dns.flags.response == 0" -T fields -e dns.qry.name | cut -d "." -f1 | tr -d "\n"
```
![image](https://user-images.githubusercontent.com/61821641/152070515-6d920ad7-87a3-4952-93a9-53bb1286294c.png)