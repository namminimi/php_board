<?php
    include_once "./include/header.php";
?>
<?php
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "select * from products";
    $result = mysqli_query($conn, $sql);
    $list = "";
    while($row = (mysqli_fetch_array($result))) {
        //var_dump($row);
        $list = $list."
        <li>
            <a href='/board/product_detail.php?pno={$row['p_no']}'>
            <img src='{$row['p_soimg']}'>
            <p>{$row['p_title']}</p>
            <p>{$row['p_price']}</p>
            </a>
        </li>    
        ";
    };
?>
<div>
    <h2>제품목록</h2>
    <div>
        <ul class="animalList">
            <?=$list?>
        </ul>
    </div>
</div>
<?php
    include_once "./include/footer.php";
?>