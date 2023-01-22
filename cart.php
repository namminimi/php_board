<?php 
    include_once "./include/header.php";
    session_start();
?>
<?php 
    $conn = mysqli_connect("localhost","root","1234","green");
    $sql = "select products.p_soimg, products.p_title, products.p_price,
    products.p_delprice, shoppingcart.c_quantity, shoppingcart.c_no,
    shoppingcart.c_memberid,shoppingcart.c_size, shoppingcart.c_color 
    from products
    inner join shoppingcart 
    on products.p_no = shoppingcart.c_pno
    where shoppingcart.c_memberid = '{$_SESSION['userid']}'
    ";
    $result = mysqli_query($conn, $sql);
    $list="";
    while($row=(mysqli_fetch_array($result))){
        //50000 => 50,000
        $totalProduct = number_format($row['p_price']*$row['c_quantity'],0,'.',',');
        $totaldelProduct = number_format($row['p_price']*$row['c_quantity']+$row['p_delprice'],0,'.',',');
        $deleprice = number_format($row['p_delprice'],0,'.',',');
        $price = number_format($row['p_price'],0,'.',',');
        $list = $list."
        <tr>
            <td><input type='checkbox' checked class='cartcheck' 
            data-price='{$row['p_price']}' 
            data-del='{$row['p_delprice']}' 
            data-quan='{$row['c_quantity']}'> 
            <img src='{$row['p_soimg']}' width='150'></td>
            <td>{$row['p_title']} 
            *사이즈 : {$row['c_size']} *컬러 :{$row['c_color']} 
            {$price}<button class='del' data-no='{$row['c_no']}' 
            onclick='cartdel(this)'>삭제</button></td>
            <td>{$row['c_quantity']}</td>
            <td>{$totalProduct}</td>
            <td>{$deleprice}</td>    
        </tr>
        <tr>
        <td colspan='5'>상품가격 <span class='price'> {$totalProduct}</span>+ 배송비<span class='price'>{$deleprice}</span> = 주문금액 <span class='price'>{$totaldelProduct}</span> </td>
        </tr>
        ";
    }
?>
<div>
        <h2>장바구니</h2>
        <div>
            <table class="cartList">
            <tr>
                <th>상품사진</th>
                <th>상품정보</th>
                <th>주문수량</th>
                <th>가격</th>
                <th>배송비</th>  
            </tr>
            <?=$list?>
            </table>
            <div class="totalprice">
                총 상품가격 <span class="price">
                    <span id="productprice">97,000</span>원</span> + 총 배송비 
                    <span class="price">
                    <span id="delprice">0</span>원</span> = 총 주문금액 
                    <span class="price">
                    <span id="totaprice">97,000</span>원</span>
            </div>
        </div>
</div>
<script>
    const checkinputs = document.querySelectorAll('.cartcheck');
    checkinputs.forEach(ch=>{
        ch.addEventListener('click',totalprice);
    })
    function totalprice(){
        let totalprice = 0;
        let totaldel = 0;
        let totaltal = 0;
        checkinputs.forEach(ch=>{
            if(ch.checked){
                const {price,del,quan} = ch.dataset;
                totalprice += price*quan;
                totaldel += Number(del);
            }
        })
        //전체상품가격 + 전체배송료
        totaltal = totalprice+totaldel;
        document.querySelector('#productprice').innerHTML = totalprice;
        document.querySelector('#delprice').innerHTML = totaldel;
        document.querySelector('#totaprice').innerHTML = totaltal;
    }
    totalprice();
    async function cartdel(cartlist){
        //cart 번호 
        const {no} = cartlist.dataset;
        try{
            const res = await fetch(`http://localhost/board/process/cartdel_process.php`,{
                method: "POST",
                header: {
                    "Content-Type":"application/json",
                },
                body : JSON.stringify({
                    c_no: no
                })
            });
            const result = await res.text();
            if(result=="yes"){
                console.log("삭제");
                location.reload();
            }else {
                console.log("삭제안됨");
            }
        }
        catch(e){
            console.log(e);
        }
    }
</script>
<?php 
    include_once "./include/footer.php";
?>