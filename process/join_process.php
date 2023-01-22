<?php
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    //패스워드랑 패스워드체크가 일치하는 확인
    if($_POST["userpw"] == $_POST["userpwch"]) {
        $password = password_hash($_POST["userpw"], PASSWORD_DEFAULT);
        $sql = "insert into member(id, pw, date, tel,name)
        values('{$_POST['userid']}','{$password}'
        ,NOW(), '{$_POST['usertel']}','{$_POST['username']}')";
        $result = mysqli_query($conn, $sql);
        if($result) {
        ?>
        <script>
            alert("회원가입 되셨습니다.")
            location.replace("../member/login.php");
        </script>
        <?php
        } else {
            echo "실패";
        }
        

        
    }else {

    
?>

<script>
    alert("비밀번호 체크가 일치하지 않습니다.");
    location.replace("../member/join.php");
</script>
<?php
    };
?>
    