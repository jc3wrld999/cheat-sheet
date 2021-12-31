
# 일반적인 명령어
```
# Directory discovery
ffuf -w /path/to/wordlist -u https://target/FUZZ

# Adding classical header (some WAF bypass)
ffuf -c -w "/opt/host/main.txt:FILE" -H "X-Originating-IP: 127.0.0.1, X-Forwarded-For: 127.0.0.1, X-Remote-IP: 127.0.0.1, X-Remote-Addr: 127.0.0.1, X-Client-IP: 127.0.0.1" -fs 5682,0 -u https://target/FUZZ

# match all responses but filter out those with content-size 42
ffuf -w wordlist.txt -u https://example.org/FUZZ -mc all -fs 42 -c -v

# Fuzz Host-header, match HTTP 200 responses.
ffuf -w hosts.txt -u https://example.org/ -H "Host: FUZZ" -mc 200

# Virtual host discovery (without DNS records)
ffuf -w /path/to/vhost/wordlist -u https://target -H "Host: FUZZ" -fs 4242


# Playing with threads and wait
./ffuf -u https://target/FUZZ -w /home/mdayber/Documents/Tools/Wordlists/WebContent_Discovery/content_discovery_4500.txt -c -p 0.1 -t 10


# GET param fuzzing, filtering for invalid response size (or whatever)
ffuf -w /path/to/paramnames.txt -u https://target/script.php?FUZZ=test_value -fs 4242

# GET parameter fuzzing if the param is known (fuzzing values) and filtering 401
ffuf -w /path/to/values.txt -u https://target/script.php?valid_name=FUZZ -fc 401



# POST parameter fuzzing
ffuf -w /path/to/postdata.txt -X POST -d "username=admin\&password=FUZZ" -u https://target/login.php -fc 401

# Fuzz POST JSON data. Match all responses not containing text "error".
ffuf -w entries.txt -u https://example.org/ -X POST -H "Content-Type: application/json" \
      -d '{"name": "FUZZ", "anotherkey": "anothervalue"}' -fr "error"
```

# -h
```
HTTP 옵션:
-H 헤더 '이름: 값'은 콜론으로 구분됩니다. 여러 개의 -H 플래그가 허용됩니다.
사용할 -X HTTP 메서드
-b Curl 기능으로 복사하기 위한 쿠키 데이터 'NAME1=VALUE1;NAME2=VALUE2'.
-d POST 데이터
-무시-body 응답 내용을 가져오지 않습니다. (기본값: 거짓)
-r 리디렉션 따름(기본값: 거짓)
-재귀 검색 반복. FUZZ 키워드만 지원되며 URL(-u)은 이 키워드로 끝나야 합니다(기본값: false).
-재귀 깊이 최대 재귀 깊이(기본값: 0)
-재귀-전략 재귀 전략: 리디렉션 기반에 대해서는 "기본값"이고 모든 일치 항목에 대해서는 "반복"입니다(기본값: 기본값).
-replay-proxy 이 프록시를 사용하여 요청과 일치합니다.
-timeout HTTP 요청 시간 초과(초) (기본값: 10)
-u 대상 URL
-x 프록시 URL(SOCKS5 또는 HTTP). 예: http://127.0.0.1:8080 또는 양말5://127.0.0.1:8080

일반 옵션:
-V 버전 정보를 표시합니다. (기본값: 거짓)
-ac 필터링 옵션 자동 보정(기본값: false)
-acc 사용자 지정 자동 교정 문자열. 여러 번 사용할 수 있습니다. -ac를 암시합니다.
-c 출력을 컬러화합니다. (기본값: 거짓)
-config 파일에서 구성 로드
-maxtime 전체 프로세스에 대한 최대 실행 시간(초)입니다. (기본값: 0)
-maxtime-job 작업당 최대 실행 시간(초)입니다. (기본값: 0)
-비대화식 콘솔 기능 사용 안 함(기본값: false)
-p 요청 간 '지연' 시간 또는 임의 지연 범위. 예: "0.1" 또는 "0.1-2.0"
-초당 요청 속도(기본값: 0)
-s 추가 정보 인쇄 안 함(무음 모드)(기본값: 거짓)
-sa 모든 오류 사례에 대해 중지합니다. -sf 및 -se를 암시합니다(기본값: false).
-se 가짜 오류 발생 시 중지(기본값: 거짓)
-sf 응답의 95%가 403 금지(기본값: 거짓)를 반환할 때 중지
-t 동시 스레드 수. (기본값: 40)
-v 상세 출력, 전체 URL 및 리디렉션 위치(있는 경우) 인쇄 결과 (기본값: 거짓)

매처 옵션:
-mc HTTP 상태 코드 일치 또는 "모두". (기본값: 200,202,307,401,403,405)
-ml 응답 행의 양 일치
-mr 일치 정규식
-ms HTTP 응답 크기 일치
-mw 응답 단어 양 일치

필터 옵션:
-Fc 응답에서 HTTP 상태 코드를 필터링합니다. 쉼표로 구분된 코드 및 범위 목록
-fl 응답하는 줄의 양을 기준으로 필터링합니다. 줄 수와 범위의 쉼표로 구분된 목록
-fr 필터 정규식
-fs 필터 HTTP 응답 크기. 쉼표로 구분된 크기 및 범위 목록
-fw 응답 단어 양을 기준으로 필터링합니다. 쉼표로 구분된 단어 수 및 범위 목록

입력 옵션:
-DirSearch 워드리스트 호환성 모드. -e 플래그와 함께 사용됩니다. (기본값: 거짓)
-e 쉼표로 구분된 확장자 목록. FUZZ 키워드를 확장합니다.
-ic 워드리스트 주석 무시(기본값: 거짓)
-input-cmd 입력을 생성하는 명령입니다. --input-num은 이 입력 방법을 사용할 때 필요합니다. -w를 재정의합니다.
-input-num 테스트할 입력 수입니다. --input-cmd와 함께 사용됩니다. (기본값: 100)
-input-shell 실행 명령에 사용할 셸
-mode 다중 워드리스트 작동 모드. 사용 가능한 모드: 집속탄, 피치포크(기본: 집속탄)
-raw http 요청을 포함하는 파일 요청
-request-proto Protocol 원시 요청과 함께 사용(기본값: https)
-w Wordlist 파일 경로 및 (선택사항) 키워드는 콜론으로 구분됩니다. 예: '/path/to/wordlist:키워드'

출력 옵션:
-debug-log 지정된 파일에 모든 내부 로깅을 기록합니다.
-o 파일에 출력 쓰기
일치하는 결과를 저장할 -od 디렉터리 경로입니다.
출력 파일 형식의 -. 사용 가능한 형식: json, ejson, html, md, csv, ecsv(또는 모든 형식에 대해 'all')(기본값: json)
-또는 결과가 없으면 출력 파일 생성 안 함(기본값: false)

사용 예:
워드 목록에서 파일 경로를 퍼즈합니다.txt, 모든 응답은 일치시키되 내용 크기가 42인 응답은 제외한다.
색칠된 장황한 출력입니다.
ffu -w 단어 목록.txt -u https://example.org/FUZZ -mc all -fs 42 -c -v

퍼즈 호스트헤더 HTTP 200 응답과 일치합니다.
ffu -w 호스트.txt -u https://example.org/ -H "호스트: FUZZ" -mc 200

퍼즈 POST JSON 데이터. "오류" 텍스트를 포함하지 않는 모든 응답을 일치시킵니다.
ffu -w entries.txt -u https://example.org/ -X POST -H "콘텐츠 유형: 응용 프로그램/json" \
-d '{"name": "FUZZ", "another key": "anothervalue"}' -fr "error"

여러 위치를 퍼징합니다. "VAL" 키워드 값을 반영하는 응답만 일치시킵니다. 색칠한.
ffuf -w params.txt:PARAM -w 값.txt:VAL -u https://example.org/?모수=VAL -mr "VAL" -c

자세한 정보 및 예: https://github.com/ffuf/ffuf
```