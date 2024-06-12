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
            .rating-star {
                display: inline-block;
                unicode-bidi: bidi-override;
                direction: rtl;
                text-align: left;
            }

            .rating-star input {
                display: none;
            }

            .rating-star label {
                float: right;
                cursor: pointer;
                color: #ccc;
            }

            .rating-star label:before {
                content: "\2605";
                font-size: 2em;
            }

            .rating-star input:checked ~ label,
            .rating-star input:checked ~ label:before {
                color: #FFD700;
            }

            .rating-star label:hover,
            .rating-star label:hover ~ label,
            .rating-star input:checked ~ label:hover,
            .rating-star input:checked ~ label:hover ~ label {
                color: #FFD700;
            }

            .feedback-user {
            /* border: 1px solid rgb(178, 178, 178); */
            min-height: 10vw;
            display: flex;
            justify-content: space-between;
        }

        .feedback-user .infor-rating {
            /* border:  1px solid black; */
            width: 90%;
            padding: 1vw;
        }

        .feedback-user .infor-rating textarea {
            width: 100%;
            height: 10vw;
            resize: none;
        }

        .error_span {
            color: red;
            text-align: center;
        }
        </style>
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
                                <h4>Bình luận</h4>    
                                <?php foreach ($order->getOrderDetail() as $orderdetail): ?>
                                        <div style="box-shadow: 0 1px 2px 0 rgb(60 64 67/ 10%), 0 2px 6px 2px rgb(60 64 67/ 15%); padding: 1vw;">
                                            <table  class="table">
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
                                            </table>
                                            <?php if($orderdetail->getFeedback() == null): ?>
                                                <form action="?route=dofeedback&orderid=<?php echo $order->getOrderId() ?>&bookid=<?php echo $orderdetail->getBook()->getBookId() ?>" method="post">
                                                    <div class="feedback-user">
                                                        <img src="view/static/img/icon_customer_feedback.png" class="img-fluid rounded-circle p-3" style="width: 5vw; height: 5vw;" alt="">
                                                        <div class="infor-rating">
                                                            <span><b><?php echo $user->getUserName() ?></b></span><br><br>
                                                            <span id="error_text" class="error_span"></span>
                                                            <textarea name="text" id="myTextarea" cols="30" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="rating-star col-lg-7">
                                                        <input type="radio" id="star5_<?php echo $orderdetail->getBook()->getBookId() ?>" name="star" value="5" />
                                                        <label for="star5_<?php echo $orderdetail->getBook()->getBookId() ?>"></label>
                                                        <input type="radio" id="star4_<?php echo $orderdetail->getBook()->getBookId() ?>" name="star" value="4" />
                                                        <label for="star4_<?php echo $orderdetail->getBook()->getBookId() ?>"></label>
                                                        <input type="radio" id="star3_<?php echo $orderdetail->getBook()->getBookId() ?>" name="star" value="3" checked/>
                                                        <label for="star3_<?php echo $orderdetail->getBook()->getBookId() ?>"></label>
                                                        <input type="radio" id="star2_<?php echo $orderdetail->getBook()->getBookId() ?>" name="star" value="2" />
                                                        <label for="star2_<?php echo $orderdetail->getBook()->getBookId() ?>"></label>
                                                        <input type="radio" id="star1_<?php echo $orderdetail->getBook()->getBookId() ?>" name="star" value="1" />
                                                        <label for="star1_<?php echo $orderdetail->getBook()->getBookId() ?>"></label>
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary"  onclick="return validateTextarea()">Gửi</button>
                                                </form>
                                            <?php endif ?>
                                            <?php if($orderdetail->getFeedback() != null): ?>
                                                <div class="d-flex">
                                                    <img src="view/static/img/icon_customer_feedback.png" class="img-fluid rounded-circle p-3" style="width: 5vw; height: 5vw;" alt="">
                                                    <div class="">
                                                        <p class="mb-2" style="font-size: 14px;"><?php echo $orderdetail->getFeedback()->getFeedbackDate() ?></p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex mb-3 col-lg-7">
                                                            <h6><?php echo $user->getUserName() ?></h6><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                            </div>
                                                            <div class="d-flex mb-4">
                                                                <?php for($i=0; $i < $orderdetail->getFeedback()->getStar(); $i++): ?>
                                                                <i class="fa fa-star text-secondary"></i>
                                                                <?php endfor ?>
                                                                <?php for($i = $orderdetail->getFeedback()->getStar(); $i < 5; $i++): ?>
                                                                    <i class="fa fa-star"></i>
                                                                <?php endfor ?>
                                                            </div>
                                                        </div>
                                                        <p><?php echo $orderdetail->getFeedback()->getText() ?></p>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->

    <script>
        function validateTextarea() {
            var textareaValue = document.getElementById('myTextarea').value;
            if (textareaValue.trim() === '') {
                document.getElementById('error_text').innerHTML = "Bạn chưa bình luận ";
                return false;
            }
            return true;
        }
    </script>

        <?php require 'view/templates/footer.php'; ?>

    </body>

</html>