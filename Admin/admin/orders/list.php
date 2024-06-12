<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\Pagination.php' ?>
    <!-- Main content -->
    <section class="content">
        <?php include '../alert.php'?>

        <div class="container-fluid">
            <div class="row my-2 d-flex-end">
                <form method="GET">
                <a href="/admin/orders/cancel.php">Yêu cầu huỷ đơn</a>
                    <div class="input-group">
                        <a href="/admin/orders/status.php">Cật nhật trạng thái đơn hàng</a>
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
                                    <th>Mã đơn hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Ngày đặt hàng</th>                                  
                                    <th>Loại ship</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Feedback</th>
                                    <th width="175">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $pager = (new Pagination())->get('book', $page, ROW_OF_PAGE);
                                    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

                                    $sql = "SELECT * FROM bookstore.order LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                   
                                    if ($keyword != '') { 
                                        $keyword = "WHERE orderid LIKE '%$keyword%' OR fullname LIKE '%$keyword%' or fullname Like '%$keyword%'";
                                        $sql = "SELECT * FROM bookstore.order $keyword LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    }
                                    $ordes = Database::GetData($sql);

                                    if ($ordes) {
                                        foreach ($ordes as $order) {
                                            $paymentBtn = $order['statusorderid'] == 0 ? '<a href="?payment=' . $order['orderid'] . '" class="btn btn-success">Thanh toán</a>' : '';
                                            echo '
                                                <tr>
                                                    <th>' . $order['orderid'] . '</th>
                                                    <td>' . $order['fullname'] . '</td>
                                                    <td>' . Helper::DateTime($order['orderdate']) . '</td>
                                                   
                                                    <td>' . Helper::typeshipname($order['typeshipid'] ).'</td>
                                                  
                                                    <td>' . $order["total"]. '</td>
                                                    <td>' . Helper::orderstatus($order['statusorderid'] ). '</td>
                                                    <td>' . Helper::statusfeedback($order['statusfeedback'] ) . '</td>
                                                    <td>
                                                        <a href="detail.php?order-id=' . $order['orderid'] . '"class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        ' . $paymentBtn . '
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
    </section>
    <!-- /.content -->
</div>
<?php include '../footer.php'?>

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

function removeRow(id) {
    if (confirm('Bạn có chắc chắn muốn xoá không?')) {
        window.location = '?del-id=' + id;
    }
}
</script>