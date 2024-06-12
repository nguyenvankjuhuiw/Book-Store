<?php $typeshipid = 1 ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Thông tin đặt hàng</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="view/static/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="view/static/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="view/static/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="view/static/css/style.css" rel="stylesheet">
        <style>
        .error_span {
            color: red;
            font-size: 13px;
        }
    </style>
    </head>

    <body>

    <?php require 'view/templates/header.php'; ?>


        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <br>
                <h1 class="mb-4">Thông tin đơn hàng</h1>
                <form action="?route=doorder" method="post">
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            
                            <div class="form-item">
                                <label class="form-label my-3">Họ và tên: <sup>*</sup></label>
                                <input type="text" name="fullname" id="fullname" value="<?php echo $user->getFullName() ?>" class="form-control"><br>
                                <span id="error_fullname" class="error_span"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Số điện thoại: <sup>*</sup></label>
                                        <input type="tel" name="phone" id="phone" value="<?php echo $user->getPhone() ?>" class="form-control"><br>
                                        <span id="error_phone" class="error_span"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Email: <sup>*</sup></label>
                                        <input type="email" name="email" id="email" value="<?php echo $user->getEmail() ?>" class="form-control"><br>
                                        <span id="error_email" class="error_span"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Thành phố: <sup>*</sup></label>
                                        <input type="text" name="city" id="city" value="<?php echo $user->getCity() ?>" class="form-control"><br>
                                        <span id="error_city" class="error_span"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Huyện: <sup>*</sup></label>
                                        <input type="text" name="district" id="district" value="<?php echo $user->getDistrict() ?>" class="form-control"><br>
                                        <span id="error_district" class="error_span"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Xã: <sup>*</sup></label>
                                        <input type="text" name="ward" id="ward" value="<?php echo $user->getWard() ?>" class="form-control"><br>
                                        <span id="error_ward" class="error_span"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Số nhà / Tên đường: <sup>*</sup></label>
                                        <input type="text" name="addressdetail" id="addressdetail" value="<?php echo $user->getAddressDetail() ?>" class="form-control"><br>
                                        <span id="error_addressdetail" class="error_span"></span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá tiền</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $total = 0;
                                        foreach ($listcart as $cart): 
                                            $total = $total + $cart->getBook()->getSalePrice() * $cart->getQuantity();
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="<?php echo $cart->getBook()->getImage() ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <?php 
                                                $bookName = $cart->getBook()->getBookName();
                                                $shortenedName = "";
                                                if(strlen($bookName) > 60){
                                                    $bookName = substr($bookName, 0, 60);
                                                    $words = explode(' ', $bookName);
                                                    $shortenedName = implode(' ', array_slice($words, 0, count($words)-1)) . '...';
                                                }
                                                else {
                                                    $shortenedName = $bookName;
                                                }
                                                
                                            ?>
                                            <td class="py-5"><?php echo $shortenedName ?></td>
                                            <td class="py-5"><?php echo number_format($cart->getBook()->getSalePrice()) . "đ" ?></td>
                                            <td class="py-5"><?php echo $cart->getQuantity() ?></td>
                                            <td class="py-5"><?php echo number_format($cart->getBook()->getSalePrice() * $cart->getQuantity()) . "đ" ?></td>
                                        </tr>
                                        
                                        <?php endforeach ?>

                                        </tr>
                                        <tr>
                                            <td class="py-5" colspan="2">
                                                <p class="mb-0 text-dark py-3">Tổng tiền sản phẩm: </p>
                                            </td>
                                            <td class="py-5" colspan="3">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark"><?php echo number_format($total) . " đ " ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-5" colspan="2">
                                                <p class="mb-0 text-dark py-4">Loại vận chuyển: </p>
                                            </td>
                                            <td class="py-5" colspan="3">
                                                <div class="py-3 border-bottom border-top">
                                                    <select name="typeshipid" onchange="changeTypeShip(this)">
                                                        <?php
                                                        if ($total < 500000) {
                                                            foreach ($listtypeship as $typeship) {
                                                                if ($typeship->getTypeShipId() != 3) {
                                                                    ?>
                                                                    <option value="<?php echo $typeship->getTypeShipId(); ?>">
                                                                        <?php echo $typeship->getTypeShipName() . " : " . number_format($typeship->getPrice()) . "đ"; ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            }
                                                        } else {
                                                            foreach ($listtypeship as $typeship) {
                                                                ?>
                                                                <option value="<?php echo $typeship->getTypeShipId(); ?>" <?php if ($total >= 500000 && $typeship->getTypeShipId() == 3): ?>selected<?php endif ?>>
                                                                    <?php echo $typeship->getTypeShipName() . " : " . number_format($typeship->getPrice()) . "đ"; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <script>
                                                function changeTypeShip(selectElement){
                                                    var selectedValue = selectElement.value;
                                                    var listtypeship = {
                                                        <?php foreach ($listtypeship as $typeship): ?>
                                                            <?php echo $typeship->getTypeShipId() ?> : <?php echo $typeship->getPrice() ?>,
                                                        <?php endforeach ?>
                                                    }
                                                    var priceship = listtypeship[selectedValue];
                                                    var totalbook = <?php echo $total ?>;
                                                    var total = priceship + totalbook;
                                                    console.log(total);
                                                    var formattedTotal = total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                                                    document.getElementById('total').innerHTML = formattedTotal;
                                                }
                                            </script>
                                        </tr>
                                        <tr>
                                            <td class="py-5" colspan="2">
                                                <p class="mb-0 text-dark py-3">TỔNG TIỀN: </p>
                                            </td>
                                            <td class="py-5" colspan="3">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark" id="total"><?php echo number_format($total + (new TypeShipDAO())->getTypeShipById($typeshipid)->getPrice()) . " đ " ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-5" colspan="2">
                                                <p class="mb-0 text-dark py-3">Hình thức thanh toán: </p>
                                            </td>
                                            <td class="py-5" colspan="3">
                                                <div class="py-3 border-bottom border-top">
                                                    <select name="methodpayid" id="">
                                                        <?php foreach ($listmethodpay as $methodpay): ?>
                                                            <option value="<?php echo $methodpay->getId() ?>"><?php echo $methodpay->getName() ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit" onclick="return checkorder()" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->
        <script>
            function checkorder(){
                let ok = true;
                let input_fullname = document.getElementById('fullname');
                if(input_fullname.value.length == 0){
                    document.getElementById('error_fullname').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_fullname').innerHTML = "";
                }

                let input_phone = document.getElementById('phone').value;
                let regex_phone = /^(0|\+84)[1-9][0-9]{8,9}$/;
                if(input_phone.length == 0){
                    document.getElementById('error_phone').innerHTML = "Không được để trống";
                    ok = false;
                }
                else if(regex_phone.test(input_phone) == false){
                    document.getElementById('error_phone').innerHTML = "Sai định dạng";
                    ok = false;
                }
                else {
                    document.getElementById('error_phone').innerHTML = "";
                }

                let input_email = document.getElementById('email').value;
                let regex_email = /^[a-z0-9]+@[a-z]+\.[a-z]+$/;
                if(input_email.length == 0){
                    document.getElementById('error_email').innerHTML = "Không được để trống";
                    ok = false;
                }
                else if(regex_email.test(input_email) == false){
                    document.getElementById('error_email').innerHTML = "Sai định dạng";
                    ok = false;
                }
                else {
                    document.getElementById('error_email').innerHTML = "";
                }

                let input_city = document.getElementById('city');
                if(input_city.value.length == 0){
                    document.getElementById('error_city').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_city').innerHTML = "";
                }

                let input_district = document.getElementById('district');
                if(input_district.value.length == 0){
                    document.getElementById('error_district').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_district').innerHTML = "";
                }

                let input_ward = document.getElementById('ward');
                if(input_ward.value.length == 0){
                    document.getElementById('error_ward').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_ward').innerHTML = "";
                }

                let input_addressdetail = document.getElementById('addressdetail');
                if(input_addressdetail.value.length == 0){
                    document.getElementById('error_addressdetail').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_addressdetail').innerHTML = "";
                }

                return ok;
            }
            
        </script>

        <?php require 'view/templates/footer.php'; ?>

    </body>

</html>