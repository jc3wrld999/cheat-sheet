DLL
#

## 💀

- Kernel32.dll
    - 메모리, 파일, 하드웨어 접근과 조작과 같은 핵심 기능을 담은 빈번히 공통으로 사용하는 DLL
    - 프로세스를 생성해 조작할 수 있음을 의미
- Advapi32.dll
    - 서비스 관리자나 레지스트리 같은 추가 핵심 윈도우 컴포넌트에 접근할 수 있음
    - 프로그램이 레지스트리를 사용함을 알려줌
    - 레지스트리 키와 같은 문자열을 검색해야 함
    - Software\Microsoft\Windows\CurrentVersion\Run 문자열은 윈도우가 부팅할 때마다 자동으로 실행되게 제어하는 레지스트리 키
- User32.dll
    - 버튼, 스크롤바, 사용자 행위 제어와 반응 컴포넌트에 접근할 수 있음
    - GUI
- Gdi32.dll
    - 그래픽 보기와 조작 관련 함수를 담고 있음
    - GUI를 가지고 있음을 확신
- Ntdll.dll
    - 윈도우 커널 인터페이스
    - 항상 간접적으로 Kernel32.dll를 통해 임포트하지만 실행파일은 일반적으로 이 파일을 직접 임포트할 수 없음
    - 실행파일이 이 파일을 임포트한다면 이는 작성자가 윈도우 프로그램에 일반적으로 허용된 기능으로 사용하지 않는다는 의미
    - 기능을 숨기거나 프로세스를 조작하는 등의 특정 작업에 이 인터페이스를 이용
- WSocl32.dll, Ws2_32.dll
    - 네트워킹 dll
    - 이걸 이용하는 프로그램은 네트워크에 연결하거나 네트워크 관련 작업을 수행할 가능성이 높음
- Wininet.dll
    - ftp, http, ntp 같은 프로토콜을 구현한 상위 수준의 네트워크 함수를 담고 있음
- Shell32.dll
    - 이 프로그램이 다른 프로그램을 실행할 수 있음을 의미