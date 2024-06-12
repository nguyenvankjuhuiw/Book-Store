<?php include 'C:\xampp\htdocs\BHT-bookstore-PHP-master\start.php'?>
<?php include 'C:\xampp\htdocs\BHT-bookstore-PHP-master\config\Pagination.php' ?>
<?php
    $id = isset($_GET['order-id']) ? $_GET['order-id'] : '';
    $conn = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
    if (!$conn) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM bookstore.order WHERE orderid = $id ";
    $result = mysqli_query($conn,$sql);
    $order = mysqli_fetch_assoc($result);


    $sql = "SELECT b.quantity as quantity, c.bookname as bookname 
        FROM orderdetail b 
        JOIN book c ON b.bookid = c.bookid
        WHERE b.orderid = $id";
        $arrayresult = $conn->query($sql);
        $data =[];
        if ($arrayresult !== false && $arrayresult->num_rows > 0) {
            while($row = $arrayresult->fetch_assoc()) {
                $data[] = $row;
            }
        }

    $conn->close();

?>
           <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 100%">
                <form class="modal-content" method="POST" enctype="multipart/form-data">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title">Chi tiết đơn hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-7 form-group">
                                <label>Mã khách hàng</label>
                                <input type="number" name="genreid" value="<?=$order['userid']?>" class="form-control" disabled>
                            </div>
                            <div class="col-md-7 form-group">
                                <label>Tên khách hàng</label>
                                <input type="text" name="ordername" value="<?=$order['fullname']?>" class="form-control" disabled >
                            </div>
                            <div class="col-md-7 form-group">
                                <label>Email</label>
                                <input type="email" name="quantity" value="<?=$order['email']?>" class="form-control" disabled>
                            </div>
                            <div class="col-md-7 form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="quantitysale" value="<?=$order['phone']?>" class="form-control" disabled>
                            </div>
                            <div class="col-md-7 form-group">
                                <label> Tên thành phố</label>
                                <input type="text" name="costprice" value="<?=$order['city']?>" class="form-control" disabled>
                            </div>
                            <div class="col-md-7 form-group">
                                <label>Ngày đặt hàng</label>
                                <input type="text" name="saleprice" value="<?=Helper::DateTime($order['orderdate'])?>" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Loại vận chuyển</label>
                                <input type="text" name="author" value="<?=Helper::typeshipname($order['typeshipid'] )?>" class="form-control" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Phí vận chuyển</label>
                                <input type="text" name="translator" value="<?=Helper::typeshipprice($order['typeshipid'])?>" class="form-control" disabled>
                            </div>
                            <div class="col-md-7 form-group">
                                <label>Danh sách Mặt Hàng và số lượng</label>
                                <?php
                                    foreach ($data as $row) {
                                        if($row['bookname'] !='')
                                        echo '<div "><label>'.$row['bookname'].': </label><label>'.$row['quantity'].'</label></div>';
                                    }
                                ?>    
                            </div>                           
                            <div class="col-md-7 form-group">
                                <label>Tiền sách</label>
                                <input type="text" name="size" value="<?=$order['totalbook']?>" class="form-control" disabled>
                            </div>
                            <div class="col-md-7 form-group">
                                <label>Tổng tiền</label>
                                <input type="number" name="pages" value="<?=$order["total"]?>" class="form-control" disabled>
                            </div>
                            <div class="col-md-7 form-group">
                                <label>Trạng thái đơn hàng</label>
                                <input type="text" name="description" value="<?=Helper::orderstatus($order['statusorderid'] )?>" class="form-control" disabled>
                            </div>
                            <div class="col-md-7 form-group">
                                <label>Phản hồi từ người dùng</label>
                                <input type="text" name="description" value="<?=Helper::statusfeedback($order['statusfeedback'] )?>" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <a href="list.php"class="btn btn-info">Quay Lại</a>
                    </div>
                </form>
            </div>
        </div>
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

<script></script>