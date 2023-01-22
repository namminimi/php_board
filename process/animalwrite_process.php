<?php
    $file = $_FILES["photourl"];
    var_dump($file);
    move_uploaded_file($file['tmp_name'], "C:Apache24/htdocs/board/images/{$file['name']}");
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "insert into animal(kinds,name,age,color,photourl)
    values('{$_POST['kinds']}',
     '{$_POST['name']}',
     {$_POST['age']},
     '{$_POST['color']}',
     '/board/images/{$file['name']}')";
     echo $sql;
     $result = mysqli_query($conn, $sql);

     if($result){
        echo "게시글을 작성했습니다.";
     } else {
        echo "실패했습니다.";
     }
     header("Location:../animal_list.php");
?>