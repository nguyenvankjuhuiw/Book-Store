<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lỗi</title>
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

</head>

    <body>

    <?php require 'view/templates/header.php'; ?>



        <!-- 404 Start -->
        <div class="container-fluid py-5">
            <div class="container py-5 text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <i class="bi bi-exclamation-triangle display-1 text-secondary"></i>
                        <h1 class="display-1">404</h1>
                        <h1 class="mb-4">Không tìm thấy trang</h1>
                        <p class="mb-4">Rất tiếc, trang bạn tìm kiếm không tồn tại trên trang web của chúng tôi! Có thể truy cập trang chủ của chúng tôi hoặc thử sử dụng tìm kiếm?</p>
                        <a class="btn border-secondary rounded-pill py-3 px-5" href="?route=home">Trở về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 404 End -->


        <?php require 'view/templates/footer.php'; ?>

    </body>

</html>