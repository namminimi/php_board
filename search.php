<?php
    include_once "./include/header.php"
?>
<?php
    //var_dump($_GET);
    function printList(){
        if(isset($_GET['searchSelect']) && isset($_GET["searchText"])) {
            $conn = mysqli_connect("localhost", "root", "1234", "green");
            //var_dump($conn);
            $sql = "select * from board where {$_GET['searchSelect']}
            like '%{$_GET['searchText']}%'"; //like는 일치하는지 찾아줌, %%어디가 일치하는지 체크
            $result = mysqli_query($conn, $sql);
            echo "
            <table class='listTable'>
                <tr>
                    <th>번호</th> 
                    <th>제목</th> 
                    <th>글쓴이</th>
                    <th>등록일</th>
                </tr>";
            $list = "";    
            while($row = mysqli_fetch_array($result)) {
                $list = $list."
                <tr>
                    <td>{$row['no']}</td>
                    <td><a href='detailview.php?no={$row['no']}'>{$row['title']}</a></td>
                    <td>{$row['writer']}</td>
                    <td>{$row['writerdate']}</td>
                </tr>";
            }
            if($list) {
                echo $list;
            } else {
                echo "<tr><td colspan='4'>일치하는 게시글이 없습니다.</td></tr>";
            }
            
            echo "</table>";
        } else {
            echo "없어요";
        }
    }
    
?>
<div class="search">
    <h2>게시글 검색</h2>
    <div>
        <form>
            <select name="searchSelect">
                <option value="writer">글쓴이</option>
                <option value="title">제목</option>
            </select>
            <input type="text" name="searchText">
            <button type="submit">검색</button>
        </form>
        
    </div>
    <?php printList() ?>
</div>
<?php
    include_once "./include/footer.php";
?>   