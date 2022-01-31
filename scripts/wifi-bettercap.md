bettercap
#
[setup](https://www.bettercap.org/installation/)
```
sudo apt update
sudo apt install golang git build-essential libpcap-dev libusb-1.0-0-dev libnetfilter-queue-dev
```
`run`
```
go get -u github.com/bettercap/bettercap
```
#
```
bettercap -iface wlan0
wifi.recon on
```
![image](https://user-images.githubusercontent.com/61821641/151451179-8c6306cc-699a-45e6-8dc8-c70066a86f8d.png)
#
reference
- [install & run](https://miloserdov.org/?p=1112)