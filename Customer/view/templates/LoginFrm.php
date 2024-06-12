<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
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
            font-size: 11px;
        }
    </style>
</head>
<body>
    <?php require 'view/templates/header.php'; ?>
    <!-- <div style="height: 150px;"></div> -->
    <div class="container-fluid fruite py-5">  
        <div class="container py-5">
            <br>
            <form action="?route=dologin" method="post">
            <div class="row g-4 justify-content-center" style="width: 40%; margin: auto; box-shadow: 0 1px 2px 0 rgb(60 64 67/ 10%), 0 2px 6px 2px rgb(60 64 67/ 15%); padding: 2vw;">
                <h2 style="text-align: center; ">Đăng nhập </h2>
                <?php if(isset($error)): ?>
                    <p style="text-align: center; color: red;"><?php echo $error ?></p>
                <?php endif ?>
                    <div class="col-md-12 col-lg-9">
                        <label for="username" class="form-label my-3">Tên đăng nhập: *</label><br>
                        <input type="text" name="username" id="username" class="form-control">
                        <span id="error_username" class="error_span"></span>                                       
                    </div>
                    <div class="col-md-12 col-lg-9">
                        <label for="password" class="form-label my-3">Mật khẩu: *</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                        <span id="error_password" class="error_span"></span><br>                                       
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return checklogin()" style="width: 30%;">Đăng nhập</button>

                    <span style="text-align: center; "><a href="?route=forgetpassword">Quên mật khẩu</a></span><br>
                    <span style="text-align: center; ">Bạn chưa có tài khoản?<span><a href="?route=register">Đăng kí</a></span></span><br>
                    <span style="text-align: center; ">Hoặc đăng nhập với</span>
                    <a href="<?php echo $url ?>"  style="text-align: center; ">Google</a>
                    <a href="<?php echo $loginUrl ?>"  style="text-align: center; ">Facebook</a>
            </div>
            </form>
            
            
        </div>
    </div>


    <script type="text/javascript">
            function checklogin()
            {
                let ok = true;
                let input_username = document.getElementById('username');
                if(input_username.value.length == 0){
                    document.getElementById('error_username').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_username').innerHTML = "";
                }

                let input_password = document.getElementById('password');
                if(input_password.value.length == 0){
                    document.getElementById('error_password').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_password').innerHTML = "";
                }
                return ok;
            }
        </script>
    
    <?php require 'view/templates/footer.php'; ?>

</body>
</html>