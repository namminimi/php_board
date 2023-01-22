<?php 
    include_once "./include/header.php";
?>
<?php 
    $conn = mysqli_connect("localhost","root","1234","green");
    $sql = "select * from board";
    $result = mysqli_query($conn, $sql);
    $list="";
    while($row=(mysqli_fetch_array($result))){
        $list = $list."
        <tr>
            <td>{$row['no']}</td>
            <td><a href='detailview.php?no={$row['no']}'>{$row['title']}</a></td>
            <td>{$row['writer']}</td>
            <td>{$row['writerdate']}</td>
        </tr>
        ";
    }
    $sql2 = "select * from animals";
    $result2 = mysqli_query($conn, $sql2);
    $list2="";
    while($row=(mysqli_fetch_array($result2))){
        $list2 = $list2."
        <li>
            <img src='{$row['photourl']}'>
            <p>{$row['kinds']} : {$row['name']}</p>
        </li>
        ";
    }
    
?>
    <div>
        <h2>동물 목록</h2>
        <div>
            <ul class="animalList">
            <?=$list2?>
            </ul>
        </div>
        <h2>게시글 목록</h2>
        <table class="listTable">
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>글쓴이</th>
                <th>등록일</th>
            </tr>
            <?=$list?>
        </table>
    </div>
<?php 
    include_once "./include/footer.php";
?>





       