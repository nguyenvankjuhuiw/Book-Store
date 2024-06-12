<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\Pagination.php' ?>

        <?php
            $id = isset($_GET['edit-id']) ? $_GET['edit-id'] : '';
            $cate = [];
            if ($id != '') {
                $sql = "SELECT * FROM genre WHERE genreid = $id";
                $cate = Database::GetData($sql, ['row' => 0]);
            }
        ?>
        <div class="container-fluid">
            <div class="row my-2 d-flex-end">
            <a href="add.php"class="btn btn-warning"><i class="fas fa-marker">Thêm thể loại mới</i></a>
                <form method="GET">
                    <div class="input-group">
                        <input type="text" name="keyword" placeholder="Tìm kiếm theo tên thể loại" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info">Tìm kiếm<i class="fas fa-search"></i></button>
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
                                    <th>Mã thể loại</th>
                                    <th>Tên thể loại</th>
                                    <th width="111">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $pager = (new Pagination())->get('genre', $page, ROW_OF_PAGE);

                                    $sql = "SELECT * FROM genre ORDER BY genreid ASC LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;

                                    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                                    if ($keyword) {
                                        $keyword = "WHERE genrename LIKE '%$keyword%' ";
                                        $sql = "SELECT * FROM genre $keyword ORDER BY genreid ASC LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    }

                                    //$sql = "SELECT * FROM genre $keyword ORDER BY genreid ASC LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    $genre = Database::GetData($sql);

                                    if ($genre) {
                                        foreach ($genre as $cate) {
                                            echo '
                                                <tr>
                                                    <th>' . $cate['genreid'] . '</th>
                                                    <td>' . $cate['genrename'] . '</td>
                                                    <td>
                                                        <a href="edit.php?edit-id=' . $cate['genreid'] . '"class="btn btn-warning"><i class="fas fa-marker">Sửa</i></a>
                                                        <a onclick="removeRow(' . $cate['genreid'] . ')" class="btn btn-danger"><i class="fas fa-trash-alt">Xoá</i></a>
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