<?php
    //var_dump($_FILES);
    $file1 = $_FILES['p_soimg'];
    $file2 = $_FILES['p_bigimg'];
    //파일 위치이동(임시저장경로에서 images 폴더로 이동)
    if($file1) {
        move_uploaded_file($file1['tmp_name'], "C:Apach24/htdocs/board/product/{$file1['name']}");
    }
    if($file2) {
        move_uploaded_file($file2['tmp_name'], "C:Apach24/htdocs/board/product/{$file2['name']}");
    }
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "insert into products(p_title, p_soimg, p_bigimg, p_price, p_delprice, p_sodesc, p_desc, p_color, p_size, p_quantity)
    values('{$_POST['p_title']}',
    '/board/product/{$file1['name']}',
    '/board/product/{$file2['name']}',
    {$_POST['p_price']},
    {$_POST['p_delprice']},
    '{$_POST['p_sodesc']}',
    '{$_POST['p_desc']}',
    '{$_POST['p_color']}',
    '{$_POST['p_size']}',
    {$_POST['p_quantity']})";
    var_dump($sql);
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: ../product_list.php");
    } else {
        echo "실패";
    }
?>