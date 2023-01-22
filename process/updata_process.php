<?php
    //var_dump($_POST);
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "update board set writer='{$_POST['writer']}', 
    title='{$_POST['title']}', 
    contents='{$_POST['contents']}' 
    where no={$_POST['no']}";
    echo $sql;
    //update board set writer='이블루글쓴이',
    //title = '게시글제모제목',
    //contents='주말은 멀고멀다..뉴뉴'
    //where no=1
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "성공";
    } else {
        echo "실패";
    }

    header("Location: ../index.php");

?>