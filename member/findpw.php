<?php
    include_once "../include/header.php";
?>
<div>
    <h2>비밀번호 찾기</h2>
    <form action="../process/findpw_process.php" method="post">
        <p>아이디 : <input type="text" name="id"></p>
        <p>연락처 : <input type="text" name="tel"></p>
        <p>
            <button type="submit">찾기</button>
            <button type="reset">취소</button>
        </p>
    </form>
        <p>
            <button onclick="location.href='findid.php'">아이디 찾기</button>
            <button onclick="location.href='findpw.php'">비밀번호 찾기</button>
        </p>
    
</div>
<?php
    include_once "../include/footer.php";
?>