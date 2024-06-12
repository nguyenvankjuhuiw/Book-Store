<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruitables - Vegetable Website Template</title>
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
                                <h2 style="text-align: center; ">Thông tin đơn hàng</h2>
                                <br>
                                <h4>Thông tin người nhận</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th scope="col">Tên người nhận</th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo $order->getFullName() ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Số điện thoại </th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo $order->getPhone() ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Email </th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo $order->getEmail() ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Thành phố </th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo $order->getCity() ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Huyện </th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo $order->getDistrict() ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Xã </th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo $order->getWard() ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Số nhà / Tên đường </th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo $order->getAddressDetail() ?></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <br>
                                <h4>Thông tin sản phẩm</h4>
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
                                            foreach ($order->getOrderDetail() as $orderdetail): ?>
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
                                </div>
                                <h4>Thông tin thanh toán</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th scope="col">Tổng tiền sách</th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo number_format($order->getTotalBook()) . " đ " ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Phí vận chuyển</th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo number_format($order->getTypeShip()->getPrice()) . " đ " ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tổng tiền</th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo number_format($order->getTotal()) . " đ " ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Hình thức</th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo $order->getMethodPay()->getName() ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Trạng thái đơn hàng</th>
                                            <td>
                                                <p class="mb-0 mt-4"><?php echo $order->getStatusOrder()->getStatusOrderName() ?></p>
                                            </td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart Page Start -->
        <!-- <div class="container-fluid py-5">
            <div class="container py-5">
                <br>
                <h3>Thông tin đơn hàng</h3>
                <br>
                <h4>Thông tin người nhận</h4>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th scope="col">Tên người nhận</th>
                            <td>
                                <p class="mb-0 mt-4"><?php echo $order->getFullName() ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Số điện thoại </th>
                            <td>
                                <p class="mb-0 mt-4"><?php echo $order->getPhone() ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Email </th>
                            <td>
                                <p class="mb-0 mt-4"><?php echo $order->getEmail() ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Thành phố </th>
                            <td>
                                <p class="mb-0 mt-4"><?php echo $order->getCity() ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Huyện </th>
                            <td>
                                <p class="mb-0 mt-4"><?php echo $order->getDistrict() ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Xã </th>
                            <td>
                                <p class="mb-0 mt-4"><?php echo $order->getWard() ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Số nhà / Tên đường </th>
                            <td>
                                <p class="mb-0 mt-4"><?php echo $order->getAddressDetail() ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <br>
                <h4>Thông tin sản phẩm</h4>
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
                            foreach ($order->getOrderDetail() as $orderdetail): ?>
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
                </div>

                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Tổng tiền sách</h5>
                                <p class="mb-0 pe-4"><?php echo number_format($order->getTotalBook()) . " đ " ?></p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Phí vận chuyển</h5>
                                <p class="mb-0 pe-4"><?php echo number_format($order->getTypeShip()->getPrice()) . " đ " ?></p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Tổng tiền</h5>
                                <p class="mb-0 pe-4"><?php echo number_format($order->getTotal()) . " đ " ?></p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Hình thức</h5>
                                <?php if($order->getMethodPay() == 0): ?>
                                    <p class="mb-0 pe-4">Thanh toán khi nhận hàng</p>
                                <?php endif ?>
                                <?php if($order->getMethodPay() == 1): ?>
                                    <p class="mb-0 pe-4">Thanh toán trực tuyến</p>
                                <?php endif ?>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Trạng thái đơn hàng </h5>
                                <p class="mb-0 pe-4"><?php echo $order->getStatusOrder()->getStatusOrderName() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Cart Page End -->


        <?php require 'view/templates/footer.php'; ?>

    </body>

</html>