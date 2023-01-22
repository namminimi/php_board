<?php
    include_once "./include/header.php";
    session_start();
?>


<?php
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "select * from products where p_no={$_GET['pno']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $color="";
    $size="";
    if($row['p_color']!=""){
        //"흰색, 블루, 핑크"
        $newColorArr = explode(",", $row['p_color']);
        foreach($newColorArr as $value) {
            $color = $color."<option value='{$value}'>{$value}</option>";
        }
    }
    if($row['p_size']!=""){
        //"흰색, 블루, 핑크"
        $newColorArr = explode(",", $row['p_size']);
        foreach($newColorArr as $value) {
            $size = $size."<option value='{$value}'>{$value}</option>";
        }
    }
?>
<div id="productDetail">
    <h2>상품 자세히 보기</h2>
    <h3><?=$row['p_title']?></h3>
    <table>
        <form action="./process/cartAdd_process.php" method="post">
        <input type="hidden" name="c_pno" value="<?=$row['p_no']?>">
        <?php
            if(isset($_SESSION['userid'])) {
                ?>
                <input type="hidden" value="<?=$_SESSION['userid']?>" name="c_memberid">
                <?php
            }
        ?>    
        <tr>
            <td>
                <img src="<?=$row['p_soimg']?>" alt="">
            </td>
            <td>
                <p><span>가격</span><?=$row['p_price']?></p>
                <p><span>배송료</span><?=$row['p_delprice']?></p>
                <p><span>수량</span><input type="number" min="1" max="<?=$row['p_cuantity']?>"
                name="c_quantity"></p>
                <?php
                    if($row['p_size']!="") {
                        ?>
                        <p>
                            <span>사이즈</span>
                            <select name="c_size" id="">
                                <?=$size?>
                            </select>
                        </p>
                        <?php
                    }

                ?>
                <?php
                    if($row['p_color']!="") {
                        ?>
                        <p>
                            <span>색상</span>
                            <select name="c_color" id="">
                                <?=$color?>
                            </select>
                        </p>
                        <?php
                    }
                    
                ?>
                <div>
                    <button type="submit">장바구니 담기</button>
                </div>
            </td>
        </tr>
        </form>
        <tr>
            <td colspan="2" id="detailview">
                상세설명
                <img src="<?=$row['p_bigimg']?>" alt="">
            </td>
        </tr>
    </table>
</div>

<?php
    include_once "./include/footer.php";
?>