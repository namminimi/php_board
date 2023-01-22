<?php
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "delete from board where no={$_POST["no"]}";
    $result = mysqli_query($conn, $sql); //결과받음
    //echo $_POST["no"];
    if($result) {  //result가 true면
        echo "성공";
    } else {
        echo "실패";
    }
    header("Location:../index.php");
?>