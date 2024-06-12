<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Cập nhật thông tin</title>
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

        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="row g-4">
                        <div class="col-lg-3" style="width: 20%;">
                            <div class="row g-4">
                                <!-- Start Filter category -->
                                <?php require 'view/templates/menucustomer.php' ?>
                                <!-- End Filter category -->

                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                <h2 style="text-align: center; ">Cập nhật thông tin</h2>
                                <br>
                                <div class="col-md-12 col-lg-6 col-xl-7">
                                    <table class="table">
                                        <tr scope="col">
                                            <th>Tên đăng nhập: </th>
                                            <td><p><?php echo $user->getUserName() ?></p></td>
                                        </tr>
                                    </table>
                                </div>  
                                <div class="col-md-12 col-lg-6 col-xl-7">
                                    <form action="?route=doupdateprofile" method="post">

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
                                        <br>
                                        <button type="submit" onclick="return checkprofile()" class="btn btn-primary">Hoàn thành</button>
                                    </form>    
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->

        <script>
            function checkprofile(){
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