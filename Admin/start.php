<?php include 'config/config.php'?>
<?php include 'config/database.php'?>
<?php include 'config/Helper.php'?>

<?php
session_start();
    if (!$_SESSION['role']){
        header("Location: sign.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookstore</title>
    <link rel="icon" href="/assets/img/favicon.png" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,100" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=HOME_TEMPLATE_URL?>/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=ADMIN_TEMPLATE_URL?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=HOME_TEMPLATE_URL?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=HOME_TEMPLATE_URL?>/css/ustora-style.css">
    <link rel="stylesheet" href="<?=HOME_TEMPLATE_URL?>/css/responsive.css">

    <style>
    .form-search {
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-search input,
    .form-search .btn {
        font-size: inherit;
        font-family: inherit;
        padding: 8px;
        border: 1px solid #ccc;
    }

    .form-search input {
        width: 100%;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        outline: none;
    }

    .form-search .btn {
        background-color: #428bca;
        color: white;
        padding: 8px 16px;
        border-radius: 0;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .form-search .btn:hover {
        opacity: 0.7;
    }
    </style>
</head>

<body>
    <h2>BOOKSTORE</h2>
    <a href="/logout.php">Đăng xuất</a>
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/admin/books/list.php">Quản lý sách</a></li>
                        <li><a href="/admin/genre/list.php">Quản lý thể loại</a></li>
                        <li><a href="/admin/users/list.php">Quản lý người dùng</a></li>
                        <li><a href="/admin/orders/list.php">Quản lý đơn hàng</a></li>
                        <li><a href="/admin/revenue/index.php">Thống kê doanh thu</a></li>
                        <li><a href="/admin/revenue/thongkesp.php">Thống kê sản phẩm</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
</body>
</html>