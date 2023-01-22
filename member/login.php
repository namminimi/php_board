<?php
   include_once "../include/header.php";
?>
<div>
    <h2>로그인</h2>
    <form action="../process/login_process.php" method="post">
        <p>아이디: <input type="text" name="id"></p>
        <p>패스워드: <input type="password" name="pw"></p>
        <p>
            <button type="submit">로그인</button>
            <button type="button" onclick="location.href='join.php'">회원가입</button>
        </p>
    </form>
        <p>
            <button onclick="location.href = 'finded.php'">아이디 찾기</button>
            <button onclick="location.href = 'findpw.php'">비밀번호 찾기</button>
        </p>
    
</div>
<?php
    include_once "../include/footer.php";
?>