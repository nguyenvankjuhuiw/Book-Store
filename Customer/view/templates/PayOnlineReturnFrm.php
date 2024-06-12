<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán trực tuyến</title>
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
    <div class="container-fluid py-5" style="width:50%">
        <div class="container py-5">
            <br>
            <h3 style="text-align: center;">
            <?php
                if ($secureHash == $vnp_SecureHash) {
                    if ($inforreturn['vnp_ResponseCode'] == '00') {
                        echo "<span style='color:#81c408'>Thanh toán thành công</span>";
                    } else {
                        echo "<span style='color:red'>Thành toán thất bại </span>";
                    }
                } else {
                    echo "<span style='color:red'>Thông tin không hợp lệ </span>";
                }
                ?>
            </h3><br>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <td>
                            <p class="mb-0 mt-4"><?php echo $inforreturn['vnp_TxnRef'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Số tiền</th>
                        <td>
                            <p class="mb-0 mt-4"><?php echo number_format($inforreturn['vnp_Amount']/100) . ' đ ' ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Nội dung thanh toán</th>
                        <td>
                            <p class="mb-0 mt-4"><?php echo $inforreturn['vnp_OrderInfo'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Mã phản hồi (vnp_ResponseCode)</th>
                        <td>
                            <p class="mb-0 mt-4"><?php echo $inforreturn['vnp_ResponseCode'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Mã GD Tại VNPAY</th>
                        <td>
                            <p class="mb-0 mt-4"><?php echo $inforreturn['vnp_TransactionNo'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Mã Ngân hàng</th>
                        <td>
                            <p class="mb-0 mt-4"><?php echo $inforreturn['vnp_BankCode'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Thời gian thanh toán </th>
                        <td>
                            <p class="mb-0 mt-4"><?php echo $inforreturn['vnp_PayDate'] ?></p>
                        </td>
                    </tr>
                </table>
            </div>
            <?php if ($secureHash == $vnp_SecureHash and $inforreturn['vnp_ResponseCode'] == '00'): ?>
            <a href="?route=historyorder" class="btn btn-primary" style="float: right;">Xem đơn hàng</a>
            <?php endif ?>
        </div>
    </div>
    
    
    <?php require 'view/templates/footer.php'; ?>

</body>
</html>