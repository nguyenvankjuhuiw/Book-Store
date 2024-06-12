<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Giỏ hàng</title>
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
            text-align: center;
        }
        </style>
    </head>

    <body>

    <?php require 'view/templates/header.php'; ?>
        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá tiền</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Xóa</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $total = 0;
                            foreach ($listcart as $cart): 
                                if($cart->getCheckbox()):
                                $total = $total + $cart->getBook()->getSalePrice() * $cart->getQuantity();
                                endif;
                            ?>
                            <tr>
                                <td>
                                    <form action="?route=checkboxincart" method="post">
                                        <input type="hidden" name="bookid" value="<?php echo $cart->getBook()->getBookId() ?>">
                                        <input type="checkbox" name="checkbox" value="1" style="width: 1.5vw; height: 1.5vw; border-radius: 50%;" <?php if($cart->getCheckbox()): ?> checked <?php endif ?> onchange="submitForm(this)">
                                    </form>
                                </td>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo $cart->getBook()->getImage() ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                <?php 
                                    $bookName = $cart->getBook()->getBookName();
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
                                    <p class="mb-0 mt-4"><a href="?route=bookdetail&bookid=<?php echo $cart->getBook()->getBookId() ?>"><?php echo $shortenedName ?></a></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo number_format($cart->getBook()->getSalePrice()) . "đ" ?></p>
                                </td>
                                <td>
                                    <!-- Start Add Cart -->
                                    <br>
                                    <form action="?route=updatecart" method="post">
                                        <input type="hidden" name="bookid" value="<?php echo $cart->getBook()->getBookId() ?>">
                                        <button type="submit" onclick="decrement(<?php echo $cart->getBook()->getBookId() ?>)" class="btn btn-sm rounded-circle bg-light border"><i class="fas fa-minus"></i></button>
                                        <input type="number" name="quantity" id="quantity_<?php echo $cart->getBook()->getBookId() ?>" value="<?php echo $cart->getQuantity() ?>" min="0" max="<?php echo $cart->getBook()->getQuantity() ?>" readonly>
                                        <button type="submit" onclick="increment(<?php echo $cart->getBook()->getBookId() ?>)" class="btn btn-sm rounded-circle bg-light border"><i class="fas fa-plus"></i></button>
                                    </form><br>
                                    <?php 
                                        $quantitybook = $cart->getBook()->getQuantity();
                                        $quantitycart = $cart->getQuantity();
                                        if($quantitycart > $quantitybook):
                                    ?>
                                    <span class="error_span">Số lượng bán: <?php echo $cart->getBook()->getQuantity() ?></span>
                                    <?php endif ?>
                                    <!-- End Add Cart -->
                                </td>
                                
                                <td>
                                    <p class="mb-0 mt-4"><?php echo number_format($cart->getBook()->getSalePrice() * $cart->getQuantity()) . "đ" ?></p>
                                </td>
                                <td>
                                    <a href="?route=deletecart&bookid=<?php echo $cart->getBook()->getBookId() ?>" class="btn btn-md rounded-circle bg-light border mt-4" >
                                        <i class="fa fa-times text-danger"></i>
                                    </a>
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
                                <h5 class="mb-0 ps-4 me-4">Tổng tiền</h5>
                                <p class="mb-0 pe-4" id="totalValue"><?php echo number_format($total) . " đ " ?></p>
                            </div>
                            <a href="?route=checkout" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
        <script>
            function increment(bookId) {
                var quantityInput = document.getElementById('quantity_' + bookId);
                var currentValue = parseInt(quantityInput.value);
                if(currentValue < parseInt(quantityInput.max) ){
                    quantityInput.value = currentValue + 1;
                }
            }

            function decrement(bookId) {
                var quantityInput = document.getElementById('quantity_' + bookId);
                var currentValue = parseInt(quantityInput.value);
                if (currentValue > parseInt(quantityInput.min)) {
                    quantityInput.value = currentValue - 1;
                }
            }


            function submitForm(checkbox) {
                // Lấy form tương ứng với checkbox
                var form = checkbox.closest('form');

                // Gửi form bằng cách gọi phương thức submit()
                form.submit();
            }
        </script>

        <?php require 'view/templates/footer.php'; ?>

    </body>

</html>