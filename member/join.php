<?php
   include_once "../include/header.php";
?>

<div class="join">
    <h2>회원가입</h2>
    <div>
        <form action="../process/join_process.php" method="post">
            <p>이름 <input type="text" name="username"></p>
            <p>아이디 <input type="text" name="userid"></p>
            <p>비밀번호 <input type="password" name="userpw"></p>
            <p>비밀번호 체크 <input type="password" name="userpwch"></p>
            <p>연락처 <input type="text" name="usertel"></p>
            <p>
                <button type="submit">회원가입</button>
                <button type="reset">취소</button>
            </p>
        </form>
    </div>
</div>
<?php
    include_once "../include/footer.php";
?>