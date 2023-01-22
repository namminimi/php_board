<?php
    include_once "./include/header.php"
?>

    <div>
        <h2>제품 등록하기</h2>
        <form action="process/productwrite_process.php" method="post" enctype="multipart/form-data" 
        onsubmit="return inputCh()" name="productForm">
        <!-- 종류, 이름, 나이, 색상, 이미지 -->
        <table class="writeTable">
            <tr>
                <td>제목</td>
                <td>
                    <input type="text" name="p_title" required>
                </td>
            </tr>
            <tr>
                <th>가격</th>
                <th>
                    <input type="text" name="p_price" required>
                </th>
            </tr>
            <tr>
                <th>배송료</th>
                <th>
                    <input type="text" name="p_delprice">
                </th>
            </tr>
            <tr>
                <th>색상</th>
                <th>
                    <input type="text" name="p_color">
                </th>
            </tr>
            <tr>
                <th>사이즈</th>
                <th>
                    <input type="text" name="p_size">
                </th>
            </tr>
            <tr>
                <th>수량</th>
                <th>
                    <input type="number" name="p_quantity" required>
                </th>
            </tr>
            <tr>
                <th>제품리스트사진</th>
                <th>
                    <input type="file" name="p_soimg">
                </th>
            </tr>
            <tr>
                <th>제품상세사진</th>
                <th>
                    <input type="file" name="p_bigimg">
                </th>
            </tr>
            <tr>
                <th>간략설명(500자 이하)</th>
                <th>
                    <textarea name="p_sodesc"></textarea>
                </th>
            </tr>
            <tr>
                <th>상세설명</th>
                <th>
                    <textarea name="p_desc"></textarea>
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
            //가격, 배송료 숫자인지 체크
            const price = document.productForm.p_price;
            const p_delprice = document.productForm.p_delpirce;
            //입력값을 number타입으로 변경후 NaN인지 체크 
            if(isNaN(Number(price.value))) {
                alert("가격은 숫자만 입력해야합니다.");
                return false;
            }
            if(p_delprice.value) {
                if(isNaN(number(p_delprice.value))) {
                    alert("배송료는 숫자만 입력하세요");
                    return false;
                }
            }
        }
    </script>
<?php
    include_once "./include/footer.php"
?>    