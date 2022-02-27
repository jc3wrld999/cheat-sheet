pe
#
`peview`
- IMAGE_DOS_HEADER, MS-DOS Stub부분은 안 중요함
- IMAGE_FILE_HEADER
    - 파일에 대한 기본정보
    - Time Date Stamp
        - 실행파일을 언제 컴파일했는지 알 수 있음

![image](https://user-images.githubusercontent.com/61821641/155895475-0ed4194d-2413-488a-a7c2-bb0b06680a46.png)
- IMAGE_OPTIONAL_HEADER
    - Subsystem의 Value값을 통해 실행 파일이 콘솔인지 GUI 프로그램인지 알아낼 수 있음(해당 파일은 콘솔)
    - 콘솔 시스템
        - IMAGE_SUBSYSTEM_WINDOWS_CUI 값을 가지고 명령창에서 실행됨
    - GUI
        - IMAGE_SYBSYSTEM_WINDOWS_GUI 값을 가지고 윈도우 시스템 내에서 실행됨

![image](https://user-images.githubusercontent.com/61821641/155895590-3c126e23-65b7-499d-9f83-b5ba26e0a9eb.png)

- IMAGE_SECTION_HEADER
    - PE파일의 각 섹션에 대한 내용을 담고 있음
    - 실행파일마다 섹션은 일반적으로 동일하며 다른점이 있다면 의심해 볼 만함
    - Virtual Size
        - 프로세스 로딩 중 섹션에 공간을 얼마만큼 할당했는지
    - Size of Raw Data
        - 섹션이 디스크에 차지하는 크기
    - 일반적으로 Virtual Size와 Size of Raw Data의 값은 동일하거나 차이가 얼마 안나는데 Virtual Size가 더 큰 경우 패킹되었을 수 있음

![image](https://user-images.githubusercontent.com/61821641/155896596-77933de0-6240-4d6f-b599-44cc315c55b6.png)
