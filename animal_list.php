<?php
    include_once "./include/header.php"
?>
<?php
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "select * from animal LIMIT 30";
    //입력 결과값을 받음
    $result = mysqli_query($conn, $sql);
    $list = "";
    while($row=(mysqli_fetch_array($result))) { //배열로 바꿔줌
        $list = $list."
        <li>
            <img src='{$row['photourl']}'>
            <p>{$row['kinds']} : {$row['name']}</p>
        </li>
        ";
    }
?>
    <div>
        <h2>동물사진 목록</h2>
        <ul class="animalList">
            <?=$list?> <!-- php값만나올때는 이렇게 -->
        </ul>  
    </div>
<?php
    include_once "./include/footer.php";
?>    