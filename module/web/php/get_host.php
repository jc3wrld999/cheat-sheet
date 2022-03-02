<!-- host에 아래와 같은 매개변수를 넣으면 이 php 파일이 있는 디렉토리의 모든 파일 목록이 표시됨 -->
<!-- ping '' | ls -al #'        -->
<!-- 위 명령어와 같음 -->
<?
print system("ping '" .$_GET["host"] . "'")
?>

<!-- 아래와 같이 에러 처리를 하면 에러메세지가 나오지 않는다. -->
<!-- 이럴땐 ping이나 nc 같은 명령을 이용해 공격하고 있는 PC와 통신하게 만들어 직접 통신을 확인해 보거나 sleep같은 명령으로 처리 시간을 지연시킨 뒤 인젝션 성공 여부를 확인하는 방법을 사용한다. -->
<?php
if(preg_match("/\|/", $_GET["host"])) {
    print "Error!";
} else {
    print system("ping '" . $_GET["host"] . "'");
}
?>

<?php
if($_POST["from"]) {
    system("echo " . escapeshellarg($_POST["message"]) ." | sendmail -f " . escapeshellarg($_POST["from"]) . " '" . $_POST["to"] . "'");
}
?>

<!-- message, from은 이스케이프되기 때문에 to에는 운영체제 명령어 인젝션이 가능함 -->

<form method="POST">
    <input type="hidden" name="to" value="admin@example.com">
    보내는 사람 주소: <input type="text" name="from" value="">
    내용: <textarea name="message" rows="5" cols="50"></textarea>
    <input type="submit" value="보내기">
</form>
