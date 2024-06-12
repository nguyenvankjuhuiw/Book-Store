<?php 
require_once 'dao/OrderDAO.php' ;
session_start();
$user = null;
if(isset($_SESSION['userid'])){
    $user = (new UserDAO())->getUserById($_SESSION['userid']);
}
?>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="?route=contact" class="text-white">122 Hoàng Quốc Việt, Q.Cầu Giấy, Hà Nội</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="?route=contact" class="text-white">cuahangsach021@gmail.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="?route=errorpage" class="text-white"><small class="text-white mx-2">Chính sách bảo mật</small>/</a>
                        <a href="?route=errorpage" class="text-white"><small class="text-white mx-2">Điều khoản sử dụng </small>/</a>
                        <a href="?route=errorpage" class="text-white"><small class="text-white ms-2">Bán hàng và hoàn tiền</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="?route=home" class="navbar-brand"><h1 class="text-primary display-6">Sach021</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="?route=home" class="nav-item nav-link active">Trang chủ</a>
                            <a href="?route=book" class="nav-item nav-link">Sách</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Thể loại</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <?php 
                                    $listcategory = (new CategoryDAO())->getAllCategory();
                                    foreach ($listcategory as $cate) : 
                                    ?>
                                    <a href="?route=book&cateid=<?php echo $cate->getCateid() ?>" class="dropdown-item"><?php echo $cate->getCatename() ?></a>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <!-- <a href="#" class="nav-item nav-link">Review Sách </a> -->
                            <a href="?route=contact" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="?route=cart" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <?php if(isset($user)): ?>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php echo sizeof($user->getCart()) ?></span>
                                <?php endif ?>
                            </a>
                            <?php if(empty($user)): ?>
                            <a href="?route=login" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                            <?php endif ?>

                            <?php if(isset($user)): ?>
                            <a href="?route=historyorder" class="my-auto">
                                <?php echo $user->getUserName() ?> 
                            </a>
                            <?php endif ?>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <form action="?route=book" method="post">

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm qua từ khóa </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body d-flex align-items-center">
                        
                        <div class="input-group w-75 mx-auto d-flex">
                                <input type="search" name="key" class="form-control p-3" placeholder="Từ khóa" aria-describedby="search-icon-1">
                                <button type="submit" id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                            
                        </div>

                    </div>

                </div>
            </div>
        </div>
        </form>

        <!-- Modal Search End -->