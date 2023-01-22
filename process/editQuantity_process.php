<?php 
    $json=json_decode(file_get_contents('php://input'));
    $quantit = $json->quantit;
    $p_no = $json->p_no;
    $conn = mysqli_connect("localhost","root","1234","green");
    $sql = "update product set p_quantity={$quantit} where p_no={$p_no}";
    $result = mysqli_query($conn, $sql);
    $sql2 = "select * from product where p_no={$p_no}";
    $result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($result2);
    echo $row['p_quantity'];
?>