Volatility
#
`setup`

install https://www.volatilityfoundation.org/releases

rename volatility..standalone > volatility

```
./volatility -h 
```
#
```
volatility -f <MEMORY_FILE> imageinfo
```
![image](https://user-images.githubusercontent.com/61821641/151901287-3fb20078-2eb8-4023-bcf9-386d3f9d46e1.png)
#
```
volatility -f <MEMORY_FILE> pslist
```
![image](https://user-images.githubusercontent.com/61821641/151901923-b0ca3666-e27b-47b1-b600-c5285fbfa793.png)
#
```
volatility -f <MEMORY_FILE> --profile=<PROFILE> pslist
```
![image](https://user-images.githubusercontent.com/61821641/151902077-896a8945-d570-42d7-853a-eead714745bb.png)

```
volatility -f <MEMORY_FILE> --profile=<PROFILE> netscan
```
#

`psxview` 명령을 통해 의도적으로 숨겨진 프로세스를 볼 수 있습니다.
```
volatility -f <MEMORY_FILE> --profile=<PROFILE> psxview
```
![image](https://user-images.githubusercontent.com/61821641/151902335-2d10b9ff-6465-4707-81ac-af54901c093a.png)
#
psxview를 통해 숨겨진 프로세스를 보는 것 외에도 'ldrmodules' 명령을 통해 더 집중적으로 이를 확인할 수 있습니다. 중간에 InLoad, InInit, InMem의 세 열이 나타납니다. 이 중 하나라도 거짓이면 해당 모듈이 주입되었을 가능성이 높으며 이는 정말 나쁜 일입니다. 일반 시스템에서 위의 grep 문은 출력을 반환하지 않아야 합니다. 
```
volatility -f <MEMORY_FILE> --profile=<PROFILE> ldrmodules
```
![image](https://user-images.githubusercontent.com/61821641/151903256-f2df6f57-cbe5-4997-bbef-96b10fc5e1d6.png)
#
프로세스는 우리가 기계를 검사할 때 관심을 갖는 유일한 영역이 아닙니다. 'apihooks' 명령을 사용하여 표준 시스템 DLL에서 예기치 않은 패치를 볼 수 있습니다. Hooking module: <unknown>인 경우를 보면 정말 나쁜 것입니다. 이 명령은 실행하는 데 시간이 걸리지만 맬웨어에 의해 도입된 모든 관련 없는 코드가 표시됩니다.
```
volatility -f <MEMORY_FILE> --profile=<PROFILE> apihooks
```

#
삽입된 코드는 큰 문제가 될 수 있으며 매우 나쁜 것을 나타냅니다. 'malfind' 명령으로 이를 확인할 수 있습니다. 전체 명령 `volatility -f MEMORY_FILE.raw --profile=PROFILE malfind -D <Destination Directory>`를 사용하면 이 코드를 찾을 수 있을 뿐만 아니라 지정된 디렉토리에 덤프할 수도 있습니다.
```
volatility -f <MEMORY_FILE> --profile=<PROFILE> malfind -D /tmp
```
![image](https://user-images.githubusercontent.com/61821641/151905891-cfccc496-54c9-4acf-a5fa-fc14369f011f.png)

#
```
volatility -f <MEMORY_FILE> --profile=<PROFILE> dlllist
```
![image](https://user-images.githubusercontent.com/61821641/151906306-3a511aa1-d518-492c-83c1-1d2e95d680ba.png)


메모리에서 실행 중인 모든 DLL을 보았으므로 한 단계 더 나아가 DLL을 꺼내보겠습니다! 이제 `volatility -f MEMORY_FILE.raw --profile=PROFILE --pid=PID dlldump -D <Destination Directory>` 명령을 사용하여 이 작업을 수행하십시오. 여기서 PID는 이전에 식별한 감염된 프로세스의 프로세스 ID입니다.(psxview, ldrmodules 에서 찾은)
```
volatility -f cridex.vmem --profile=WinXPSP2x86 --pid=584 dlldump -D /tmp
```
![image](https://user-images.githubusercontent.com/61821641/151906708-2d03a78d-7365-4d90-b3f4-4f5e20924dc9.png)