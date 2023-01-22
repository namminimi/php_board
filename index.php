<?php
    include_once "./include/header.php"
?>
<?php
    $conn = mysqli_connect("localhost", "root", "1234", "green");
    //check connection
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }
    $sqltotal = "select * from board";
    $resultotal = mysqli_query($conn, $sqltotal);
    //mysqli_num_rows() -> 조회한 레코드 수
    $total = mysqli_num_rows($resultotal);


    //페이징 처리하기
    //한페이지당 레코드 개수 5
    $list_num = 5;
    //한블럭당 페이지수
    $page_num = 3;
    //현재페이지
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    echo $page."<br/>";
    //전체 페이지 / 전체 레코드수 / 페이지당 레코드수
    //ceil: 올림, floor: 내림
    $total_page = ceil($total/$list_num);
    //전체 블럭수 : 전체 페이지 수 / 블럭 당 페이지수
    $total_block = ceil($total_page / $page_num);
    //현재 블럭 번호 : 현재 페이지 번호 / 블럭 당 페이지 수
    $now_block = ceil($page/$page_num);
    //블럭당 시작 페이지 번호 : (해당 레코드의 블럭번호 -1) * 블럭당 페이지 수 + 1
    $s_pageNum = ($now_block-1) * $page_num + 1;
    //레코드가 0개인 경우
    if($s_pageNum <= 0) {
        $s_pageNum = 1;
    }
    //블럭당 마지막 페이지번호 : 현재블럭번호 * 블럭당 페이지수
    $e_pageNum = $now_block * $page_num;
    //마지막 번호가 전체 레코드 수를 넘지않도록 지정
    if($e_pageNum > $total_page) {
        $e_pageNum = $total_page;
    }
    //시작번호 : 현재 페이지 번호 -1 * 페이지당 보여질 레코드 수
    //set multi query
    $start = ($page-1)*$list_num;
    echo $page."<br/>";
    echo $total."<br/>";
    $sql = "select * from board LIMIT {$start}, {$list_num};";

    //var_dump($total);
    //입력 결과값을 받음
    $result = mysqli_query($conn, $sql);
    $list = "";
    
    while($row=(mysqli_fetch_array($result))) { //배열로 바꿔줌
        $list = $list."
        <tr>
            <td>{$row['no']}</td>
            <td><a href='detailview.php?no={$row['no']}'>{$row['title']}</a></td>
            <td>{$row['writer']}</td>
            <td>{$row['writerdate']}</td>
        </tr>
       
        ";
    }
    $sql2 = "select * from animal";
    $result2 = mysqli_query($conn, $sql2);
    $list2="";
    while($row=(mysqli_fetch_array($result2))) {
        $list2 = $list2."
        <li>
            <img src='{$row['photourl']}'>
            <p>{$row['kinds']} : {$row['name']}</p>
        </li>
        ";
    }
?>
    <div>
        <h2>게시글 목록</h2>
        <table class="listTable">
            <tr>
                <th>번호</th> 
                <th>제목</th>
                <th>글쓴이</th>
                <th>등록일</th>
            </tr>
            <?=$list?> <!-- php값만나올때는 이렇게 -->
            <tr>
                <td colspan="4">
                    <?php
                        if($page <=1) {
                            ?>
                            <a href="index.php?page=1">이전</a>
                            <?php
                        }else{
                            ?>
                            <a href="index.php?page=<?=$page-1?>">이전</a>
                            <?php
                        }
                    ?>

                    <!-- 페이지 번호 출력 -->
                    <?php
                        for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
                            ?>
                            <a href="index.php?page=<?=$print_page?>"><?=$print_page?></a>
                            <?php
                        }
                        ?>
                    <?php
                    if($page >= $total_page) {
                        ?>
                        <a href="index.php?page=<?=$total_page?>">다음</a>
                        <?php
                    }else {
                        ?>
                        <a href="index.php?page=<?=$page+1?>">다음</a>
                        <?php

                    }
                    ?>
                </td>
            </tr>
        </table>
        <div>
            <h2>동물사진 목록</h2>
            <ul class="animalList">
                <?=$list2?>  <!-- php값만나올때는 이렇게  -->
            </ul>  
        </div>
    </div>
<?php
    include_once "./include/footer.php";
?>    
    