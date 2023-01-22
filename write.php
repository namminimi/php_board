<?php
    include_once "./include/header.php"
?>

    <div>
        <h2>게시글 등록하기</h2>
        <form action="process/write_process.php" method="post">
        <table class="writeTable">
            <tr>
                <td>제목</td>
                <td>
                    <input type="text" name="writer">
                </td>
            </tr>
            <tr>
                <th>글쓴이</th>
                <th>
                    <input type="text" name="title">
                </th>
            </tr>
            <tr>
                <th>내용</th>
                <th>
                    <textarea name="contents"></textarea>
                </th>
            </tr>
                <td  colspan="2">
                    <button type="submit">등록</button>
                    <button type="reset">취소</button>
                </td>
        </table>
        </form>
    </div>
<?php
    include_once "./include/footer.php"
?>    