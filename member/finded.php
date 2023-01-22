<?php
    include_once "../include/header.php";
?>
<div>
    <h2>아이디 찾기</h2>
    <form action="../process/findid_process.php" method="post">
        <p>이름 : <input type="text" name="name"></p>
        <p>연락처 : <input type="text" name="tel"></p>
        <p>
            <button type="submit">찾기</button>
            <button type="reset">취소</button>
        </p>
        <p>
            <button onclick="location.href='findid.php'">아이디 찾기</button>
            <button onclick="location.href='findpw.php'">비밀번호 찾기</button>
        </p>
    </form>
</div>
<?php
    include_once "../include/footer.php";
?>