<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/board/css/style.css">
</head>
<body>
    <div id="wrap">
        <header>
            <h1>GreenWeb</h1>
            <ul>
                <?php
                    if(isset($_SESSION['userid'])){
                ?>
                <li><?=$_SESSION['userid']?>님 안녕하세요</li>
                <li><a href="/board/process/logout_process.php">로그아웃</a></li>
                <?php        
                    }else {
                ?>
                <li><a href="/board/member/login.php">로그인</a></li>
                <li><a href="/board/member/join.php">회원가입</a></li>
                <?php
                    }
                ?>
                <li><a href="/board/index.php">home</a></li>
                <li><a href="/board/write.php">게시글등록</a></li>
                <li><a href="/board/search.php">게시글검색</a></li>
                <li><a href="/board/animal_list.php">동물 게시글</a></li>
                <li><a href="/board/animal_write.php">동물등록</a></li>
                <li><a href="/board/product_list.php">제품목록</a></li>
                <?php
                    if($_SESSION['userid']=="admin"){
                        ?>
                        <li><a href="/board/product_write.php">제품등록</a></li>
                        <?php
                    }
                ?>
                <li><a href="/board/cart.php">장바구니</a></li>
            </ul>
        </header>
        <div id="contents">