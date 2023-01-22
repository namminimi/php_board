<?php
    include_once "./include/header.php"
?>

    <div>
        <h2>동물 등록하기</h2>
        <form action="process/animalwrite_process.php" method="post" enctype="multipart/form-data" 
        onsubmit="return inputCh()">
        <!-- 종류, 이름, 나이, 색상, 이미지 -->
        <table class="writeTable">
            <tr>
                <td>제목</td>
                <td>
                    <input type="text" name="kinds">
                </td>
            </tr>
            <tr>
                <th>이름</th>
                <th>
                    <input type="text" name="name">
                </th>
            </tr>
            <tr>
                <th>색상</th>
                <th>
                    <input type="text" name="color">
                </th>
            </tr>
            <tr>
                <th>나이</th>
                <th>
                    <input type="text" name="age" id="age" required>
                </th>
            </tr>
            <tr>
                <th>이미지</th>
                <th>
                    <input type="file" name="photourl">
                </th>
            </tr>
                <td  colspan="2">
                    <button type="submit">등록</button>
                    <button type="reset">취소</button>
                </td>
        </table>
        </form>
    </div>
    <script>
        function inputCh(){
            const input1 = document.querySelector("#age");
            //입력값을 number타입으로 변경후 NaN인지 체크 
            if(isNaN(Number(input1.value))) {
                alert("숫자만 입력해야합니다.");
                return false;
            }
        }
    </script>
<?php
    include_once "./include/footer.php"
?>    