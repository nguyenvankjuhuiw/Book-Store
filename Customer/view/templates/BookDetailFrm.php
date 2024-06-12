<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?php echo $book_detail->getBookName() ?></title>
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


        <!-- Single Page Header start -->
        <!-- <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Thông tin sản phẩm</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Sách</a></li>
                <li class="breadcrumb-item active text-white"><?php echo $book_detail->getBookName() ?></li>
            </ol>
        </div> -->
        <!-- Single Page Header End -->


        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <!-- Start Infor Book -->
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="<?php echo $book_detail->getImage() ?>" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3"><?php echo $book_detail->getBookName() ?></h4>
                                <?php if($book_detail->getAuthor() != null): ?>
                                <p class="mb-3">Tác giả: <?php echo $book_detail->getAuthor() ?></p>
                                <?php endif ?>

                                <?php if($book_detail->getTranslator()): ?>
                                <p class="mb-3">Dịch giả: <?php echo $book_detail->getTranslator() ?></p>
                                <?php endif ?>
                                <p class="mb-3">Thể loại: <?php echo $book_detail->getGenre()->getGenrename() ?></p>
                                <p class="mb-3">Đã bán: <?php echo $book_detail->getQuantitySale() ?></p>
                                <p class="mb-3">Tình trạng: 
                                    <?php 
                                    if ($book_detail->getQuantity() > 0) {
                                        echo "Còn hàng";
                                    }
                                    else {
                                        echo  "Hết hàng";
                                    }
                                    ?>
                                </p>
                                <h5 class="fw-bold mb-3"><?php echo number_format($book_detail->getSalePrice()) . " đ " ?></h5>
                                <div class="d-flex mb-4">
                                    <?php for($i=0; $i < round($book_detail->getMediumStar()); $i++): ?>
                                        <i class="fa fa-star text-secondary"></i>
                                    <?php endfor ?>
                                    <?php for($i = round($book_detail->getMediumStar()); $i < 5; $i++): ?>
                                        <i class="fa fa-star"></i>
                                    <?php endfor ?>
                                </div>
                                <!-- <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p> -->
                                <!-- <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p> -->
                                <!-- Start Add Cart -->
                                <form action="?route=addcartinbookdetail" method="post">
                                    <input type="hidden" name="bookid" value="<?php echo $book_detail->getBookId() ?>">
                                    <button type="button" onclick="decrement()" class="btn btn-sm rounded-circle bg-light border"><i class="fas fa-minus"></i></button>
                                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?php echo $book_detail->getQuantity() ?>" readonly>
                                    <button type="button" onclick="increment()" class="btn btn-sm rounded-circle bg-light border"><i class="fas fa-plus"></i></button>
                                    <br><br>
                                    <button type="submit" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i>Thêm vào giỏ</button><br>
                                </form>
                                <script>
                                    function increment() {
                                        var quantityInput = document.getElementById('quantity');
                                        var currentValue = parseInt(quantityInput.value);
                                        if(currentValue < parseInt(quantityInput.max) ){
                                            quantityInput.value = currentValue + 1;
                                        }
                                    }
                            
                                    function decrement() {
                                        var quantityInput = document.getElementById('quantity');
                                        var currentValue = parseInt(quantityInput.value);
                                        if (currentValue > parseInt(quantityInput.min)) {
                                            quantityInput.value = currentValue - 1;
                                        }
                                    }
                                </script>
                                <!-- End Add Cart -->

                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Thông tin sản phẩm</button>
                                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Bình luận</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <!-- Start Infor Book -->
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <p><?php echo nl2br($book_detail->getDescription()) ?></p>
                                        <br>
                                        <div class="px-2">
                                            <div class="row g-4">
                                                <div class="col-6">
                                                    <?php if($book_detail->getDistributor() != null): ?>
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Nhà cung cấp</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0"><?php echo $book_detail->getDistributor() ?></p>
                                                        </div>
                                                    </div>
                                                    <?php endif ?>

                                                    <?php if($book_detail->getPublisher() != null): ?>
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Nhà xuất bản</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0"><?php echo $book_detail->getPublisher() ?></p>
                                                        </div>
                                                    </div>
                                                    <?php endif ?>

                                                    <?php if($book_detail->getYear() != null): ?>
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Năm xuất bản</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0"><?php echo $book_detail->getYear() ?></p>
                                                        </div>
                                                    </div>
                                                    <?php endif ?>

                                                    <?php if($book_detail->getSize() != null): ?>
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Kích thước</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0"><?php echo $book_detail->getSize() ?></p>
                                                        </div>
                                                    </div>
                                                    <?php endif ?>

                                                    <?php if($book_detail->getPages() != null): ?>
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Số trang</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0"><?php echo $book_detail->getPages() ?></p>
                                                        </div>
                                                    </div>
                                                    <?php endif ?>

                                                    <?php if($book_detail->getWeight() != null): ?>
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Trọng lượng</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0"><?php echo $book_detail->getWeight() . " gam" ?></p>
                                                        </div>
                                                    </div>
                                                    <?php endif ?>
                                                    <!-- <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Country of Origin</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Agro Farm</p>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Infor Book -->

                                    
                                    <!-- Start Feedback -->
                                    <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                        <?php foreach($book_detail->getFeedback() as $feedback ): ?>
                                        <div class="d-flex">
                                            <img src="view/static/img/icon_customer_feedback.png" class="img-fluid rounded-circle p-3" style="width: 5vw; height: 5vw;" alt="">
                                            <div class="">
                                                <p class="mb-2" style="font-size: 14px;"><?php echo $feedback->getFeedbackDate() ?></p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex mb-3  col-lg-7">
                                                    <h6><?php echo (new UserDAO())->getUserById($feedback->getUserId())->getUserName() ?></h6><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                    </div>
                                                    <div class="d-flex mb-4">
                                                        <?php for($i=0; $i < $feedback->getStar(); $i++): ?>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <?php endfor ?>
                                                        <?php for($i = $feedback->getStar(); $i < 5; $i++): ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php endfor ?>
                                                    </div>
                                                </div>
                                                <p><?php echo $feedback->getText() ?></p>
                                            </div>
                                        </div>
                                        <?php endforeach ?> 
                                    </div>
                                    <!-- End Feedback -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- End Infor Book -->

                    <!-- Start Category -->
                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <!-- Start Filter category -->
                            <?php require 'view/templates/filtercategory.php' ?>
                            <!-- End Filter category -->
                            
                            <!-- Start selling products -->
                            <?php require 'view/templates/sellingproducts.php' ?>
                            <!-- End selling products -->
                        </div>
                    </div>
                    <!-- End Category -->
                </div>

                <!-- Start similar product -->
                <?php  
                $list_book_by_genreid = (new BookDAO())->getBookByGenreid($book_detail->getGenre()->getGenreid(), $book_detail->getBookId());
                if(sizeof($list_book_by_genreid) > 0):
                ?>
                <h1 class="fw-bold mb-0">Sản phẩm tương tự</h1>
                <div class="vesitable">
                    <div class="owl-carousel vegetable-carousel justify-content-center">
                        <?php foreach($list_book_by_genreid as $book): ?>
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="<?php echo $book->getImage() ?>" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <?php 
                                    // $bookName = $book->getBookName();
                                    $bookName = $book->getBookName();
                                    $shortenedName = "";
                                    if(strlen($bookName) > 40){
                                        $bookName = substr($bookName, 0, 40);
                                        $words = explode(' ', $bookName);
                                        $shortenedName = implode(' ', array_slice($words, 0, count($words)-1)) . '...';
                                    }
                                    else {
                                        $shortenedName = $bookName;
                                    }
                                    
                                ?>
                                <h4><a href="?route=bookdetail&bookid=<?php echo $book->getBookId() ?>"><?php echo $shortenedName ?></a></h4>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold"><?php echo number_format($book->getSalePrice()) . "đ" ?></p>
                                    <a href="?route=addcartsimilarbook&bookid=<?php echo $book_detail->getBookId() ?>&similarbookid=<?php echo $book->getBookId() ?>" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Thêm vào giỏ</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <?php endif ?>
                <!-- End similar product -->
            </div>
        </div>
        <!-- Single Product End -->
    

        <?php require 'view/templates/footer.php'; ?>

    </body>

</html>