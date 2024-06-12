<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Thay đổi mật khẩu</title>
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
                                <h2 style="text-align: center; ">Thay đổi mật khẩu</h2>
                                <?php if(isset($error)): ?>
                                    <p style="text-align: center; color: red;"><?php echo $error ?></p>
                                <?php endif ?>
                                <?php if(isset($success)): ?>
                                    <p style="text-align: center; color:#81c408;"><?php echo $success ?></p>
                                <?php endif ?>
                                <div class="col-md-12 col-lg-6 col-xl-7">
                                    <form action="?route=dochangepassword" method="post">

                                        <div class="form-item">
                                            <label class="form-label my-3">Mật khẩu cũ: <sup>*</sup></label>
                                            <input type="password" name="password1" id="password1" class="form-control"><br>
                                            <span id="error_password1" class="error_span"></span>
                                        </div>
                                        <div class="form-item">
                                            <label class="form-label my-3">Mật khẩu mới: <sup>*</sup></label>
                                            <input type="password" name="password2" id="password2" class="form-control"><br>
                                            <span id="error_password2" class="error_span"></span>
                                        </div>
                                        <div class="form-item">
                                            <label class="form-label my-3">Nhập lại mật khẩu mới: <sup>*</sup></label>
                                            <input type="password" name="password3" id="password3" class="form-control"><br>
                                            <span id="error_password3" class="error_span"></span>
                                        </div>
                                        <br>
                                        <button type="submit" onclick="return checkchangepassword()" class="btn btn-primary">Hoàn thành</button>
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
            function checkchangepassword(){
                let ok = true;
                let input_password1 = document.getElementById('password1');
                if(input_password1.value.length == 0){
                    document.getElementById('error_password1').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_password1').innerHTML = "";
                }

                let input_password2 = document.getElementById('password2');
                if(input_password2.value.length == 0){
                    document.getElementById('error_password2').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_password2').innerHTML = "";
                }

                let input_password3 = document.getElementById('password3');
                if(input_password3.value.length == 0){
                    document.getElementById('error_password3').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_password3').innerHTML = "";
                }

                if(input_password2.value.length > 0 && input_password3.value.length > 0 && input_password2.value !== input_password3.value){
                    document.getElementById('error_password3').innerHTML = "Mật khẩu không trùng khớp";
                    ok = false;
                }
                return ok;
            }
            
        </script>
        <?php require 'view/templates/footer.php'; ?>

    </body>

</html>