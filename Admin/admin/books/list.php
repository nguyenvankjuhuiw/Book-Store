<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\Pagination.php' ?>


<div class="content-wrapper">
        <div class="container-fluid">
            <div class="row my-2 d-flex-end">
            <a href="./add.php" class="btn btn-warning">Thêm sách mới</a>
                <form method="GET">
                    <div class="input-group">
                        <input type="text" name="keyword" placeholder="Từ khoá" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row my-2">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="table-warning">
                                <tr>
                                    <th>Mã sách</th>
                                    <th>Mã Thể loại</th>
                                    <th>Tên sách</th>
                                    <th>Số lượng còn lại</th>
                                    <th>Số lượng đã bán</th>
                                    <th>Giá nhập</th>
                                    <th>Giá bán</th>
                                    <th>Nhà phân phối</th>
                                    <th>Nhà xuất bản</th>
                                    <th>Tác giả</th>
                                    <th>Người dịch</th>
                                    <th>Năm xuất bản</th>
                                    <th>Kích thước</th>
                                    
                                    <th>Số trang</th>
                                    <th>Trọng lượng</th>
                                    <th>Mô tả</th>
                                    <th>Hình ảnh</th>
                                    <th width="160">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $pager = (new Pagination())->get('book', $page, ROW_OF_PAGE);
                                    
                                    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                                    $sql = "SELECT * FROM book ORDER BY bookid ASC LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    if ($keyword) {
                                        $keyword = "WHERE bookname LIKE '%$keyword%'";
                                        $sql = "SELECT * FROM book $keyword ORDER BY bookid ASC LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    }

                                    //$sql = "SELECT * FROM book $keyword ORDER BY bookid ASC LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    //$sql = "SELECT * FROM book WHERE bookname LIKE '%$keyword%'" ;
                                    $books = Database::GetData($sql);
                                    if ($books) {
                                        foreach ($books as $book) {
                                            echo '
                                                <tr>
                                                    <th>' . $book['bookid'] . '</th>
                                                    <td>' . $book['genreid']. '</td>
                                                    <td>' . $book['bookname'] . '</td>
                                                    <td>' . $book['quantity'] . '</td>
                                                    <td>' . $book['quantitysale'] . '</td>
                                                    <td>' . $book['costprice'] . '</td>
                                                    <td>' . $book['saleprice'] . '</td>
                                                    <td>' . $book['distributor'] . '</td>
                                                    <td>' . $book['publisher'] . '</td>
                                                    <td>' . $book['author'] . '</td>
                                                    <td>' . $book['translator'] . '</td>
                                            
                                                    <td>' . $book['year'] . '</td>
                                                    <td>' . $book['size'] . '</td>
                                                    <td>' . $book['pages'] . '</td>
                                                    <td>' . $book['weight'] . '</td>
                                                    <td>' . $book['description'] . '</td>
                                                    <td>' . $book['image'] . '</td>

                                                    <td>
                                                        <a href="./edit.php?edit-id=' . $book['bookid'] . '" class="btn btn-warning">Sửa thông tin sách</a>
                                                    </td> 
                                                </tr>
                                            ';
                                        }
                                    } else {
                                        echo '<tr><td colspan="100%" class="text-center">Không có dữ liệu</td></tr>';
                                    }
                                ?>
                                <button type="button" data-toggle="modal" data-target="#modal-edit" hidden>
                                    <i class="fas fa-plus"></i>
                                </button>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row my-2 d-flex-between">
                <div>Hiển thị từ <?=$pager['StartPage']?> đến <?=$pager['EndPage']?> của <?=$pager['TotalItems']?> bản ghi</div>
                <ul class="pagination">
                    <?php
                        for ($i = 1; $i <= $pager['TotalPages']; $i++) {
                            $active = $page == $i ? 'active' : '';
                            echo '<li class="page-item ' . $active . '">
                                <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                            </li>';
                        }
                    ?>
                </ul>
            </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- <?php include '../footer.php'?> -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- JQVMap -->
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/moment/moment.min.js"></script>
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=ADMIN_TEMPLATE_URL?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=ADMIN_TEMPLATE_URL?>/dist/js/adminlte.js"></script>