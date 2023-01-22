<?php
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "insert into board(writer, title, contents, writerdate) 
    values('{$_POST['writer']}','{$_POST['title']}','{$_POST['contents']}',NOW())";
    /* true값을 받음, now()현재 시간 */
    echo $sql;
    $result = mysqli_query($conn, $sql); 
    if($result) {
        echo "성공";
    }else {
        echo "실패";
    }
    header("Location:../index.php");
?>