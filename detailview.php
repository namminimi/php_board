<?php
    include_once "./include/header.php";
?>
<?php
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "select * from board where no={$_GET["no"]}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    //var_dump($row);
?>
    <div>
        <h2>게시글 보기</h2>
        <table class="viewTable">
            <tr>
                <td colspan="4"><?=$row["title"]?>제목입니다.<span>등록일</span><?=$row['writerdate']?></td>
            </tr>
            <tr>
                <td>번호</td> 
                <td><?=$row['no']?></td>
                <td>글쓴이</td>
                <td><?=$row['writer']?></td>
            </tr>
            <tr>
                <td colspan="4">
                <?=$row['contents']?>
                </td>
            </tr>
        </table>
        <div class="boardBtn">
            <form action="updata.php" method="post">
                <!-- form태그로 전송 post전송은 슈퍼글러벌 post가 받고 get도 같음 --> 
                <input type="hidden" name="no" value="<?=$row['no']?>">
                <button type="submit">수정</button>
            </form>
            <form action="process/delete_process.php" method="post">
                <!-- form태그로 전송 post전송은 슈퍼글러벌 post가 받고 get도 같음 --> 
                <input type="hidden" name="no" value="<?=$row['no']?>">
                <button type="submit">삭제</button>
            </form>
        </div>
    </div>
<?php
    include_once "./include/footer.php";
?> 