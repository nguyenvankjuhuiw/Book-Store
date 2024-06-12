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
                                <div class="col-lg-12">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" role="tablist">
                                            <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                                id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                                aria-controls="nav-about" aria-selected="true">Tất cả</button>
                                            <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                                id="nav-mission1-tab" data-bs-toggle="tab" data-bs-target="#nav-mission1"
                                                aria-controls="nav-mission1" aria-selected="false">Chờ xác nhận</button>
                                            <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                                id="nav-mission2-tab" data-bs-toggle="tab" data-bs-target="#nav-mission2"
                                                aria-controls="nav-mission2" aria-selected="false">Đang chuẩn bị</button>
                                            <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                                id="nav-mission3-tab" data-bs-toggle="tab" data-bs-target="#nav-mission3"
                                                aria-controls="nav-mission3" aria-selected="false">Đang giao</button>
                                            <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                                id="nav-mission4-tab" data-bs-toggle="tab" data-bs-target="#nav-mission4"
                                                aria-controls="nav-mission4" aria-selected="false">Hoàn thành</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content mb-5">
                                        <!-- Start Infor Book -->
                                        
                                        <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                            <?php foreach ($listallorder as $order) : ?>
                                                <div style="box-shadow: 0 1px 2px 0 rgb(60 64 67/ 10%), 0 2px 6px 2px rgb(60 64 67/ 15%); padding: 1vw;">
                                                    <p class="mb-3">Ngày đặt: <?php echo $order->getOrderDate() ?></p>
                                                    <p class="mb-3">Trạng thái: <?php echo $order->getStatusOrder()->getStatusOrderName() ?></p>
                                                    <p class="mb-3">Phí vận chuyển: <?php echo number_format($order->getTypeShip()->getPrice()) . " đ " ?></p>
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
                                                            <?php foreach ($order->getOrderDetail() as $orderdetail): ?>
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
                                                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                                        <h5 class="mb-0 ps-4 me-4">Tổng tiền</h5>
                                                        <p class="mb-0 pe-4"><?php echo number_format($order->getTotal()) . " đ " ?></p>
                                                    </div>
                                                    <?php if($order->getStatusOrder()->getStatusOrderId()==2 && $order->getRequestcancel() == 1): ?>
                                                        
                                                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                                        <h5 class="mb-0 ps-4 me-4">Bạn đã gửi yêu cầu hủy đơn</h5>
                                                    </div>
                                                    <?php endif ?>
                                                    <a href="?route=infororder&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Xem chi tiết</a>
                                                    <?php if($order->getStatusOrder()->getStatusOrderId()==1): ?>
                                                        <a href="?route=ordercancel&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Hủy đơn hàng</a>
                                                    <?php endif ?>
                                                    <?php if($order->getStatusOrder()->getStatusOrderId()==2): ?>
                                                        <?php if($order->getRequestcancel() == 0): ?>
                                                            <a href="?route=requestcancel&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Yêu cầu hủy đơn</a>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                    <?php if($order->getStatusOrder()->getStatusOrderId()==3): ?>
                                                        <a href="?route=complete&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Hoàn thành </a>
                                                    <?php endif ?>
                                                    <?php if($order->getStatusOrder()->getStatusOrderId()==4): ?>
                                                        <?php if($order->getStatusFeedback() == 0): ?>
                                                        <a href="?route=feedback&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Đánh giá</a>
                                                        <?php endif ?>
                                                        <?php if($order->getStatusFeedback() == 1): ?>
                                                        <a href="?route=feedback&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Xem đánh giá</a>
                                                        <?php endif ?>
                                                    <?php endif ?>

                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                        <!-- End Infor Book -->
                                        <div class="tab-pane" id="nav-mission1" role="tabpanel" aria-labelledby="nav-mission1-tab">
                                            <?php foreach ($listorder1 as $order) : ?>
                                                <div style="box-shadow: 0 1px 2px 0 rgb(60 64 67/ 10%), 0 2px 6px 2px rgb(60 64 67/ 15%); padding: 1vw;">
                                                    <p class="mb-3">Ngày đặt: <?php echo $order->getOrderDate() ?></p>
                                                    <p class="mb-3">Phí vận chuyển: <?php echo number_format($order->getTypeShip()->getPrice()) . " đ " ?></p>
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
                                                            <?php foreach ($order->getOrderDetail() as $orderdetail): ?>
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
                                                                    <p class="mb-0 mt-4"><?php echo $shortenedName ?></p>
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
                                                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                                        <h5 class="mb-0 ps-4 me-4">Tổng tiền</h5>
                                                        <p class="mb-0 pe-4"><?php echo number_format($order->getTotal()) . " đ " ?></p>
                                                    </div>
                                                    <a href="?route=infororder&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Xem chi tiết</a>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="tab-pane" id="nav-mission2" role="tabpanel" aria-labelledby="nav-mission2-tab">
                                            <?php foreach ($listorder2 as $order) : ?>
                                                <div style="box-shadow: 0 1px 2px 0 rgb(60 64 67/ 10%), 0 2px 6px 2px rgb(60 64 67/ 15%); padding: 1vw;">
                                                    <p class="mb-3">Ngày đặt: <?php echo $order->getOrderDate() ?></p>
                                                    <p class="mb-3">Phí vận chuyển: <?php echo number_format($order->getTypeShip()->getPrice()) . " đ " ?></p>
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
                                                            <?php foreach ($order->getOrderDetail() as $orderdetail): ?>
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
                                                                    <p class="mb-0 mt-4"><?php echo $shortenedName ?></p>
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
                                                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                                        <h5 class="mb-0 ps-4 me-4">Tổng tiền</h5>
                                                        <p class="mb-0 pe-4"><?php echo number_format($order->getTotal()) . " đ " ?></p>
                                                    </div>
                                                    <?php if($order->getStatusOrder()->getStatusOrderId()==2 && $order->getRequestcancel() == 1): ?>
                                                        
                                                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                                        <h5 class="mb-0 ps-4 me-4">Bạn đã gửi yêu cầu hủy đơn</h5>
                                                    </div>
                                                    <?php endif ?>
                                                    <a href="?route=infororder&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Xem chi tiết</a>
                                                    <?php if($order->getStatusOrder()->getStatusOrderId()==2): ?>
                                                        <?php if($order->getRequestcancel() == 0): ?>
                                                            <a href="?route=requestcancel&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Yêu cầu hủy đơn</a>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="tab-pane" id="nav-mission3" role="tabpanel" aria-labelledby="nav-mission3-tab">
                                            <?php foreach ($listorder3 as $order) : ?>
                                                <div style="box-shadow: 0 1px 2px 0 rgb(60 64 67/ 10%), 0 2px 6px 2px rgb(60 64 67/ 15%); padding: 1vw;">
                                                    <p class="mb-3">Ngày đặt: <?php echo $order->getOrderDate() ?></p>
                                                    <p class="mb-3">Phí vận chuyển: <?php echo number_format($order->getTypeShip()->getPrice()) . " đ " ?></p>
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
                                                            <?php foreach ($order->getOrderDetail() as $orderdetail): ?>
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
                                                                    <p class="mb-0 mt-4"><?php echo $shortenedName ?></p>
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
                                                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                                        <h5 class="mb-0 ps-4 me-4">Tổng tiền</h5>
                                                        <p class="mb-0 pe-4"><?php echo number_format($order->getTotal()) . " đ " ?></p>
                                                    </div>
                                                    <a href="?route=infororder&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Xem chi tiết</a>
                                                    <a href="?route=complete&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Hoàn thành </a>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="tab-pane" id="nav-mission4" role="tabpanel" aria-labelledby="nav-mission4-tab">
                                            <?php foreach ($listorder4 as $order) : ?>
                                                <div style="box-shadow: 0 1px 2px 0 rgb(60 64 67/ 10%), 0 2px 6px 2px rgb(60 64 67/ 15%); padding: 1vw;">
                                                    <p class="mb-3">Ngày đặt: <?php echo $order->getOrderDate() ?></p>
                                                    <p class="mb-3">Phí vận chuyển: <?php echo number_format($order->getTypeShip()->getPrice()) . " đ " ?></p>
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
                                                            <?php foreach ($order->getOrderDetail() as $orderdetail): ?>
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
                                                                    <p class="mb-0 mt-4"><?php echo $shortenedName ?></p>
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
                                                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                                        <h5 class="mb-0 ps-4 me-4">Tổng tiền</h5>
                                                        <p class="mb-0 pe-4"><?php echo number_format($order->getTotal()) . " đ " ?></p>
                                                    </div>
                                                    <a href="?route=infororder&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Xem chi tiết</a>
                                                    <?php if($order->getStatusFeedback() == 0): ?>
                                                    <a href="?route=feedback&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Đánh giá</a>
                                                    <?php endif ?>
                                                    <?php if($order->getStatusFeedback() == 1): ?>
                                                    <a href="?route=feedback&orderid=<?php echo $order->getOrderId() ?>" class="btn btn-primary">Xem đánh giá</a>
                                                    <?php endif ?>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
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