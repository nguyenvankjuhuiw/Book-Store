<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\Pagination.php' ?>

<?php
    // Delete items
    if (isset($_GET['del-id'])) {
        $id = isset($_GET['del-id']) ? $_GET['del-id'] : '';
        $sql = "DELETE FROM user WHERE userid = '$id'";

        if (Database::NonQuery($sql)) {
            $message = [
                'type' => 'success',
                'text' => 'Xoá thành công',
            ];
        }
        else{
            $message = [
                'type' => "waring",
                'text' => "Xoá không thành công"
            ];
        }
    }
?>
 
        <div class="container-fluid">
            <div class="row my-2 d-flex-end">
                <form method="GET">
                <a href="add.php"class="btn btn-warning"><i class="fas fa-marker">Thêm admin mới</i></a>
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
                                    <th>Mã người dùng</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Thành phố</th>
                                    <th>Huyện</th>
                                    <th>Phường</th>
                                    <th>Địa chỉ chi tiết</th>
                                    <th>Loại tài khoản</th>
                                    <th width="113">Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $pager = (new Pagination())->get('user', $page, ROW_OF_PAGE);

                                    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                                    $sql = "SELECT * FROM user LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    if ($keyword) {
                                        $keyword = "AND (username LIKE '%$keyword%' OR fullname LIKE '%$keyword%')";
                                        $sql = "SELECT * FROM user, role WHERE user.roleid= role.roleid $keyword LIMIT " . $pager['StartIndex'] . ', ' . ROW_OF_PAGE;
                                    }
                                    $users = Database::GetData($sql);

                                    if ($users) {
                                        foreach ($users as $user) {
                                            echo '
                                                <tr>
                                                    <th>' . $user['userid'].'</th>
                                                    <th>' . $user['username'] . '</th>
                                                    <td>' . $user['fullname'] . '</td>
                                                    <td>' . $user['email'] . '</td>
                                                    <td>' . Helper::Phone($user['phone']) . '</td>
                                                    <td>' . $user['city'] . '</td>
                                                    <td>' . $user['district'] . '</td>
                                                    <td>' . $user['ward'] . '</td>
                                                    <td>' . $user['addressdetail'] . '</td>
                                                    <td>' . Helper::role($user['roleid']) . '</td>
                                                    <td>
                                                        <a href="change-password.php?id=' . $user['userid'] . '"class="btn btn-info"><i class="fas fa-key"></i>Đổi pw</a>
                                                        <a href="edit.php?edit-id=' . $user['userid'] . '"class="btn btn-warning"><i class="fas fa-marker"></i>Đổi thông tin</a>
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