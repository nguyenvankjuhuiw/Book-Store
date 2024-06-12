<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Sách</title>
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


        <!-- Single Page Header start -->
        <!-- <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Cửa hàng</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div> -->
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <!-- <h1 class="mb-4">Cửa hàng sách</h1>     -->
                <div class="row g-4">
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <!-- Start Filter category -->
                                    <?php require 'view/templates/filtercategory.php' ?>
                                    <!-- End Filter category -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Giá tiền</h4>
                                                <span id="error_price" class="error_span"></span><br>
                                            <!-- <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                                            <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output> -->
                                            <form action="" method="post">
                                            <div class="row g-4 justify-content-center">
                                                <div class="col-md-12 col-lg-6">
                                                    <label for="pricestart" class="form-label my-3">Từ:</label>
                                                    <span id="error_pricestart" class="error_span"></span><br>
                                                    <input type="tel" name="pricestart" id="pricestart" class="form-control">
                                                </div>
                                                <div class="col-md-12 col-lg-6">
                                                    <label for="priceend" class="form-label my-3">Đến:</label>
                                                    <span id="error_priceend" class="error_span"></span><br>
                                                    <input type="tel" name="priceend" id="priceend" class="form-control">
                                                </div>
                                                <button type="submit" onclick="return checkprice()" class="btn btn-primary" style="width: 30%;">Tìm kiếm</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <a href=""></a>
                                        </div>
                                    </div>
                                    <!-- Start selling products -->
                                    <?php require 'view/templates/sellingproducts.php' ?>
                                    <!-- End selling products -->

                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                <h4><?php echo $info_filter ?></h4>
                                <?php if($countlistbook == 0): ?>
                                <h4 style="text-align: center; color:red;">Không tìm thấy sản phẩm</h4>
                                <?php endif ?>
                                <form action="?route=book" method="post">
                                    <select name="selectid" onchange="this.form.submit()">
                                        <option <?php if($selectid == 0): ?>selected<?php endif ?> value="0">Tất cả </option>
                                        <option <?php if($selectid == 1): ?>selected<?php endif ?> value="1">Bán chạy </option>
                                        <option <?php if($selectid == 2): ?>selected<?php endif ?> value="2">Giá từ cao xuống thấp </option>
                                        <option <?php if($selectid == 3): ?>selected<?php endif ?> value="3">Giá từ thấp lên cao </option>
                                    </select>
                                </form>
                                    <!-- Start Book -->
                                    <?php foreach ($listbook as $book): ?>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="<?php echo $book->getImage() ?>" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?php echo $book->getGenre()->getGenrename() ?></div> -->
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <?php 
                                                    // $bookName = $book->getBookName();
                                                    $bookName = $book->getBookName();
                                                    $shortenedName = "";
                                                    if(strlen($bookName) > 50){
                                                        $bookName = substr($bookName, 0, 50);
                                                        $words = explode(' ', $bookName);
                                                        $shortenedName = implode(' ', array_slice($words, 0, count($words)-1)) . '...';
                                                    }
                                                    else {
                                                        $shortenedName = $bookName;
                                                    }
                                                    
                                                ?>
                                                <h5><a href="?route=bookdetail&bookid=<?php echo $book->getBookId() ?>"><?php echo $shortenedName ?></a></h5>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0"><?php echo number_format($book->getSalePrice()) . 'đ' ?></p>
                                                    <a href="?route=addcartinbook&bookid=<?php echo $book->getBookId() ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i>Thêm vào giỏ</a>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                    <!-- End Book -->

                                    <!-- Start Pages -->
                                    <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            <!-- <a href="#" class="rounded">&laquo;</a> -->
                                            <?php for($i = 1; $i <= $numberpage; $i++): ?>
                                            <a href="?route=book&page=<?php echo $i ?>" class="<?php if($i == $page): ?>active<?php endif ?> rounded"><?php echo $i ?></a>
                                            <?php endfor ?>
                                            <!-- <a href="#" class="rounded">2</a>
                                            <a href="#" class="rounded">3</a>
                                            <a href="#" class="rounded">4</a>
                                            <a href="#" class="rounded">5</a>
                                            <a href="#" class="rounded">6</a> -->
                                            <!-- <a href="#" class="rounded">&raquo;</a> -->
                                        </div>
                                    </div>
                                    
                                    <!-- End Pages -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->
        <script>
            function checkprice(){
                let ok = true;
                let regexprice = /^\d+$/;
                let pricestart = document.getElementById('pricestart');
                if(pricestart.value.length == 0){
                    document.getElementById('error_pricestart').innerHTML = "Điền thiếu";
                    ok = false;
                }
                else if(regexprice.test(pricestart.value) == false){
                    document.getElementById('error_pricestart').innerHTML = "Điền sai";
                    ok = false;
                }
                else {
                    document.getElementById('error_pricestart').innerHTML = "";
                }

                let priceend = document.getElementById('priceend');
                if(priceend.value.length == 0){
                    document.getElementById('error_priceend').innerHTML = "Điền thiếu";
                    ok = false;
                }
                else if(regexprice.test(priceend.value) == false){
                    document.getElementById('error_priceend').innerHTML = "Điền sai";
                    ok = false;
                }
                else {
                    document.getElementById('error_priceend').innerHTML = "";
                }

                if(pricestart.value >= priceend.value){
                    document.getElementById('error_price').innerHTML = "Điền sai";
                    ok = false;
                }
                else {
                    document.getElementById('error_price').innerHTML = "";
                }

                return ok;
            }
        </script>

        <?php require 'view/templates/footer.php'; ?>

    </body>

</html>