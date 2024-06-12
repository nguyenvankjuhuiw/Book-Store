<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Thông tin cá nhân</title>
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
                                <h4>Thông tin cá nhân</h4>    
                                <table class="table">
                                    <tr scope="col">
                                        <th>Họ và tên: </th>
                                        <td>
                                            <p class="mb-0 mt-4"><?php echo $user->getFullName() ?></p></td>
                                    </tr>
                                    <tr scope="col">
                                        <th>Tên đăng nhập: </th>
                                        <td><p class="mb-0 mt-4"><?php echo $user->getUserName() ?></p></td>
                                    </tr>
                                    <tr scope="col">
                                        <th>Email: </th>
                                        <td><p class="mb-0 mt-4"><?php echo $user->getEmail() ?></p></td>
                                    </tr>
                                    <tr scope="col">
                                        <th>Số điện thoại: </th>
                                        <td><p class="mb-0 mt-4"><?php echo $user->getPhone() ?></p></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Thành phố </th>
                                        <td>
                                            <p class="mb-0 mt-4"><?php echo $user->getCity() ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Huyện </th>
                                        <td>
                                            <p class="mb-0 mt-4"><?php echo $user->getDistrict() ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Xã </th>
                                        <td>
                                            <p class="mb-0 mt-4"><?php echo $user->getWard() ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Số nhà / Tên đường </th>
                                        <td>
                                            <p class="mb-0 mt-4"><?php echo $user->getAddressDetail() ?></p>
                                        </td>
                                    </tr>
                                </table>
                                <a href="?route=updateprofile" class="btn btn-primary" style="width:15vw;">Cập nhật</a>
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