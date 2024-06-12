<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\Pagination.php' ?>
<?php
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     // Add images
    //     $image_path = '';
    //     if (isset($_FILES['pic'])) {
    //         $image_size = $_FILES['pic']['size'];
    //         $image_path = '/uploads/' . $_FILES['pic']['name'];
    //         move_uploaded_file($_FILES['pic']['tmp_name'], '../../' . $image_path);
    //     }

        // Add items
        if (isset($_POST['action']) && $_POST['action'] == 'exit') {
            header('Location: list.php');
        }
        if (isset($_POST['action']) && $_POST['action'] == 'add') {
            $genreid = isset($_POST['genreid']) ? $_POST['genreid'] : '';
            $bookname = isset($_POST['bookname']) ? $_POST['bookname'] : '';
            $quantity =  isset($_POST['quantity']) ? $_POST['quantity'] : '';
            $quantitysale = isset($_POST['quantitysale']) ? $_POST['quantitysale'] : '';
            $costprice = isset($_POST['costprice']) ? $_POST['costprice'] : '';
            $saleprice = isset($_POST['saleprice']) ? $_POST['saleprice'] : '';
            $distributor = isset($_POST['distributor']) ? $_POST['distributor'] : '';
            $publisher = isset($_POST['publisher']) ? $_POST['publisher'] : '';
            $author = isset($_POST['author']) ? $_POST['author'] : '';
            $translator = isset($_POST['translator']) ? $_POST['translator'] : '';
            $year = isset($_POST['year']) ? $_POST['year'] : '';
            $size = isset($_POST['size']) ? $_POST['size'] : '';
            $pages = isset($_POST['pages']) ? $_POST['pages'] : '';
            $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $image = isset($_POST['image']) ? $_POST['image'] : '';

            if (!empty($bookname)) {

                $connection = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
                if (!$connection) {
                    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                }
                
                $sql = "SELECT MAX(bookid) as maxid FROM book";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_assoc($result);
                $maxid = $row['maxid'] ? $row['maxid'] + 1 : 1;
                
                $genreid = mysqli_real_escape_string($connection, $genreid);
                $bookname = mysqli_real_escape_string($connection, $bookname);
                $quantity = mysqli_real_escape_string($connection, $quantity);
                $quantitysale = mysqli_real_escape_string($connection, $quantitysale);
                $costprice = mysqli_real_escape_string($connection, $costprice);
                $saleprice = mysqli_real_escape_string($connection, $saleprice);
                $distributor = mysqli_real_escape_string($connection, $distributor);
                $publisher = mysqli_real_escape_string($connection, $publisher);
                $author = mysqli_real_escape_string($connection, $author);
                $translator = mysqli_real_escape_string($connection, $translator);
                $year = mysqli_real_escape_string($connection, $year);
                $size = mysqli_real_escape_string($connection, $size);
                $pages = mysqli_real_escape_string($connection, $pages);
                $weight = mysqli_real_escape_string($connection, $weight);
                $description = mysqli_real_escape_string($connection, $description);
                $image = mysqli_real_escape_string($connection, $image);
                
                $sql = "INSERT INTO book VALUES ('$maxid', '$genreid', '$bookname', '$quantity', '$quantitysale', '$costprice', '$saleprice', '$distributor', '$publisher', '$author', '$translator', '$year', '$size', '$pages', '$weight', '$description', '$image')";
                if (mysqli_query($connection, $sql)) {
                    echo "Lưu thông tin sách thành công.";
                    header('Location: list.php');
                } else {
                    echo "Lỗi khi lưu thông tin sách: " . mysqli_error($connection);
                }
                
                mysqli_close($connection);
                if (Database::NonQuery($sql)) {
                    echo "lưu thành công";
                    $message = [
                        'type' => 'success',
                        'text' => 'Thêm thành công',
                    ];
                }
            } else {
                $message = [
                    'type' => 'warning',
                    'text' => 'Tên sách không được trống',
                ];
            }
        }
    ?>
    <?php
        $genre = [];
        $sql = "SELECT genreid, genrename FROM genre ";
        $connection = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $genre[] = $row;
        }
    ?>
    <!-- Modal: Add -->
            <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-width: 800px">
                <form class="modal-content" method="POST" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title">Thêm sách</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Thể loại</label>
                                <select name="genreid">
                                    <?php
                                        foreach ($genre as $row) {
                                            echo '<option name="cateid" value="' . $row['genreid'] . '">' . $row['genrename'] . '</option>';
                                        }
                                    ?>                           
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Tên sách</label>
                                <input type="text" name="bookname" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số lượng</label>
                                <input type="number" name="quantity" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số lượng đã bán</label>
                                <input type="number" name="quantitysale" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Giá nhập</label>
                                <div class="input-group">
                                    <input type="number" name="costprice" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">vnd</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Giá bán</label>
                                <div class="input-group">
                                    <input type="number" name="saleprice" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">vnd</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Nhà phân phối</label>
                                <input type="text" name="distributor" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Nhà xuất bản</label>
                                <input type="text" name="publisher" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Tên tác giả</label>
                                <input type="text" name="author" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Người dịch</label>
                                <input type="text" name="translator" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Năm xuất bản</label>
                                <input type="text" name="year" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Kích cỡ</label>
                                <input type="text" name="size" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số trang</label>
                                <input type="number" name="pages" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Trọng lượng</label>
                                <input type="number" name="weight" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mô tả</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Link ảnh</label>
                                <input type="text" name="image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="action" value="exit" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                        <button name="action" value="add" class="btn btn-success">Thêm</button>
                    </div>
                    
                </form>
            </div>
        </div>
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

<script>
$(document).ready(function() {
    function GetParameterValues(param) {
        var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < url.length; i++) {
            var urlparam = url[i].split('=');
            if (urlparam[0] == param) {
                return urlparam[1];
            }
        }
    }

    if (GetParameterValues('edit-id') != undefined) {
        document.querySelector("[data-target='#modal-edit']").click();
    }
});
const editButtons = document.querySelectorAll('.edit-button');
const editLink = document.getElementById('edit-link');
const modal = document.getElementById('modal-edit');

// Thêm event listener vào liên kết "Sửa thông tin sách"
editLink.addEventListener('click', (event) => {
  // Ngăn chặn hành động mặc định của liên kết (tải trang mới)
  event.preventDefault();

  // Lấy ID sách từ data-id của liên kết
  const bookId = editLink.dataset.id;

  // Hiển thị modal
  modal.classList.add('show');

  // Thực hiện các hành động khác, ví dụ: load dữ liệu sách từ ID
});
function removeRow(id) {
    if (confirm('Bạn có chắc chắn muốn xoá không?')) {
        window.location = '?del-id=' + id;
    }
}
</script>