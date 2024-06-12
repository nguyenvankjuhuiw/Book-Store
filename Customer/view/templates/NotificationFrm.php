<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Lịch sử đơn hàng</title>
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
                                <h2>Thông báo</h2> 
                                <?php foreach ($listnotification as $noti) : ?>
                                    <div style="box-shadow: 0 1px 2px 0 rgb(60 64 67/ 10%), 0 2px 6px 2px rgb(60 64 67/ 15%); padding: 1vw;">
                                        <h4><?php echo $noti->getNote() ?></h4>
                                        <p class="mb-3"><?php echo $noti->getDate() ?></p>
                                        <p class="mb-3">Tổng tiền đơn hàng: <?php echo number_format($noti->getOrder()->getTotal()) . "đ" ?></p>
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
                                                <?php foreach ($noti->getOrder()->getOrderDetail() as $orderdetail): ?>
                                                    <tr>
                                                                <th scope="row">
                                                                    <div class="d-flex align-items-center">
                                                                        <img src="<?php echo $orderdetail->getBook()->getImage() ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                <?php 
                                                                    $bookName = $orderdetail->getBook()->getBookName();
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
                                                                    <p class="mb-0 mt-4"><a href="?route=bookdetail&bookid=<?php echo $orderdetail->getBook()->getBookId() ?>"><?php echo $shortenedName ?></a></p>
                                                                </td>
                                                                <td>
                                                                    <p class="mb-0 mt-4"><?php echo number_format($orderdetail->getBook()->getSalePrice()) . "đ" ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class="mb-0 mt-4"><?php echo number_format($orderdetail->getQuantity()) ?></p>
                                                                </td>
                                                                
                                                                <td>
                                                                    <p class="mb-0 mt-4"><?php echo number_format($orderdetail->getBook()->getSalePrice() * $orderdetail->getQuantity()) . "đ" ?></p>
                                                                </td>
                                                            </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        <a href="?route=infororder&orderid=<?php echo $noti->getOrder()->getOrderId() ?>" class="btn btn-primary">Xem chi tiết</a>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->


        <?php require 'view/templates/footer.php'; ?>

    </body>

</html>