<?php
    include_once "./include/header.php"
?>
<?php
    echo $_POST["no"];
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    $sql = "select * from board where no={$_POST['no']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>

    <div>
        <h2>게시글 수정하기</h2>
        <form action="process/updata_process.php" method="post">
        <table class="writeTable">
            <input type="hidden" name="no" value=<?=$row['no']?>>
            <tr>
                <td>제목</td>
                <td>
                    <input type="text" name="writer" value=<?=$row["writer"]?>>
                </td>
            </tr>
            <tr>
                <th>글쓴이</th>
                <th>
                    <input type="text" name="title" value=<?=$row["title"]?>>
                </th>
            </tr>
            <tr>
                <th>내용</th>
                <td>
                    <textarea name="contents"><?=$row["contents"]?></textarea>
                </td>
            </tr>
                <td  colspan="2">
                    <button type="submit">수정</button>
                    <button type="reset">취소</button>
                </td>
        </table>
        </form>
    </div>
<?php
    include_once "./include/footer.php"
?>    