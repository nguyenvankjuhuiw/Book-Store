<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
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
    
    <div class="container-fluid fruite py-5">  
        <div class="container py-5">
            <br>
            <form action="?route=dopassnew&username=<?php echo $username ?>" method="post">
                <div class="row g-4 justify-content-center" style="width: 40%; margin: auto; box-shadow: 0 1px 2px 0 rgb(60 64 67/ 10%), 0 2px 6px 2px rgb(60 64 67/ 15%); padding: 2vw;">
                    <h2 style="text-align: center; ">Nhập mật khẩu mới</h2>
                    <?php if(isset($error)): ?>
                        <p style="text-align: center; color: red;"><?php echo $error ?></p>
                    <?php endif ?>
                    <div class="col-md-12 col-lg-10">
                        <label for="password" class="form-label my-3">Mật khẩu: </label><br>
                        <input type="password" name="password" id="password" class="form-control">
                        <span id="error_password" class="error_span"></span>
                    </div>
                    <div class="col-md-12 col-lg-10">
                        <label for="password2" class="form-label my-3">Nhập lại mật khẩu: </label><br>
                        <input type="password" name="password2" id="password2" class="form-control">
                        <span id="error_password2" class="error_span"></span><br>
                    </div>
                    <button type="submit" onclick="return checkregister()" class="btn btn-primary" style="width: 30%;">Hoàn thành</button>

                </div>
            </form>
        </div>
    </div>
        
    <script type="text/javascript">
            function checkregister()
            {
                let ok = true;
                let input_password = document.getElementById('password');
                if(input_password.value.length == 0){
                    document.getElementById('error_password').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_password').innerHTML = "";
                }

                let input_password2 = document.getElementById('password2');
                if(input_password2.value.length == 0){
                    document.getElementById('error_password2').innerHTML = "Không được để trống";
                    ok = false;
                }
                else {
                    document.getElementById('error_password2').innerHTML = "";
                }

                if(input_password.value.length > 0 && input_password2.value.length > 0 && input_password.value !== input_password2.value){
                    document.getElementById('error_password2').innerHTML = "Mật khẩu không trùng khớp";
                    ok = false;
                }

                return ok;
            }
        </script>
    
    <?php require 'view/templates/footer.php'; ?>

</body>
</html>