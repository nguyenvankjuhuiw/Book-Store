<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>Liên hệ</title>
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
            <h1 class="text-center text-white display-6">Contact</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active text-white">Contact</li>
            </ol>
        </div> -->
        <!-- Single Page Header End -->


        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <!-- <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Get in touch</h1>
                                <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100" 
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6535921934915!2d105.78964677486303!3d21.046542280607188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab303f75aa1d%3A0xc569edc8f17029d2!2zMTIyIEhvw6BuZyBRdeG7kWMgVmnhu4d0LCBD4buVIE5odeG6vywgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1713288404103!5m2!1svi!2s" 
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                                
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="?route=docontact" method="post">
                                <input type="text" name="name" id="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Tên của bạn">
                                <span id="error_name" class="error_span"></span>                                       
                                <input type="email" name="email" id="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Email nhận phản hồi">
                                <span id="error_email" class="error_span"></span>                                       
                                <textarea name="mess" id="mess" class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Câu hỏi"></textarea>
                                <span id="error_mess" class="error_span"></span>                                       
                                <button type="submit" onclick="return checkcontact()" class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Gửi</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Địa chỉ</h4>
                                    <p class="mb-2">122 Hoàng Quốc Việt, Q.Cầu Giấy, Hà Nội</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Mail </h4>
                                    <p class="mb-2">cuahangsach021@gmail.com</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Số điện thoại</h4>
                                    <p class="mb-2">(+012) 3456 7890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

    <script>
        function checkcontact(){
            let ok = true;
            let name = document.getElementById('name');
            if(name.value.length == 0){
                document.getElementById('error_name').innerHTML = "Không được để trống";
                ok = false;
            }
            else {
                document.getElementById('error_name').innerHTML = "";
            }

            let email = document.getElementById('email');
            if(email.value.length == 0){
                document.getElementById('error_email').innerHTML = "Không được để trống";
                ok = false;
            }
            else {
                document.getElementById('error_email').innerHTML = "";
            }

            var textareaValue = document.getElementById('mess').value;
            if (textareaValue.trim() === '') {
                document.getElementById('error_mess').innerHTML = "Bạn chưa nhập câu hỏi";
                return false;
            }
            else {
                document.getElementById('error_mess').innerHTML = "";
            }
            return ok;
        }
    </script>
        <?php require 'view/templates/footer.php'; ?>

    </body>

</html>