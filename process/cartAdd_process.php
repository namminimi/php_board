<?php
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "insert into shoppingcart(c_memberid, c_pno, c_quantity, c_size, c_color)
    values('{$_POST[c_memberid]}',
    {$_POST[c_pno]},
    {$_POST[c_quantity]},
    '{$_POST[c_size]}',
    '{$_POST[c_color]}')";
    var_dump($sql);
    $result = mysqli_query($conn, $sql);
    if($result) {
        ?>
        <script>
            alert("장바구니에 담았습니다.");
            history.back();
        </script>
        <?php
        //header("Location: ../product_list.php");
        //echo "성공";
    } else {
        echo "실패";
    }
?>