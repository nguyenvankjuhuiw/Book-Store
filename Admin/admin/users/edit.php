<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\Pagination.php' ?>
<?php
    if (isset($_POST['action']) && $_POST['action'] == 'exit') {
        header('Location: list.php');
    }
    if (isset($_POST['action']) && $_POST['action'] == 'edit') {
        $id = isset($_GET['edit-id']) ? $_GET['edit-id'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        echo $username;
        $password = isset($_GET['password']) ? $_GET['password'] : '';
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $city = isset($_POST['city']) ? $_POST['city'] : '';
        $district = isset($_POST['district']) ? $_POST['district'] : '';
        $ward = isset($_POST['ward']) ? $_POST['ward'] : '';
        $addresdetail = isset($_POST['addresdetail']) ? $_POST['addresdetail'] : '';

        $connection = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
                
        if (!$connection) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }

        $sql = "UPDATE user 
        SET  
        username = '$username',
        fullname = '$fullname', 
        password = '$password', 
        email = '$email', 
        phone= '$phone', 
        city = '$city', 
        district = '$district', 
        ward = '$ward', 
        addressdetail = '$addresdetail'   
        WHERE userid = '$id'";
        echo "?";
        echo $username;
        if (mysqli_query($connection, $sql)) {
            header('Location: list.php');
            echo "Lưu thông tin thành công.";
        } else {
            echo "Lỗi khi lưu thông tin người dùng: " . mysqli_error($connection);
        }
        mysqli_close($connection);
        
    }
?>
    <section class="content">
        <?php include '../alert.php'?>
        <?php
            $id = isset($_GET['edit-id']) ? $_GET['edit-id'] : '';
            $user = [];
            if ($id != '') {
                $sql = "SELECT * FROM user WHERE userid = '$id'";
                $user = Database::GetData($sql, ['row' => 0]);
            }
        ?>
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <form class="modal-content" method="POST">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title">Sửa tài khoản</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mã người dùng</label>
                            <input type="number" name="id" value="<?=$user['userid']?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" name="username" value="<?=isset($user['username']) ? $user['username'] : '';?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tên đầy đủ</label>
                            <input type="text" name="fullname" value="<?=$user['fullname']?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?=$user['email']?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" value="<?=$user['phone']?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Thành phố sinh sống</label>
                            <input type="text" name="city" value="<?=$user['city']?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Huyện</label>
                            <input type="text" name="district" value="<?=$user['district']?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Phường</label>
                            <input type="text" name="ward" value="<?=$user['ward']?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ chi tiết</label>
                            <input type="text" name="addressdetail" value="<?=$user['addressdetail']?>" class="form-control" >
                        </div>
                        <?php
                            $sql = 'SELECT * FROM role';
                            $rolename = Database::GetData($sql);
                        ?>
                        <div class="form-group">
                            <label>Loại tài khoản</label>
                            <select class="form-control" name="accountType">
                                <?php foreach ($rolenames as $rolename) {
                                        $selected = $rolenames['roleid'] == $user['roleid'] ? 'selected' : '';
                                        echo '<option value="' . $rolenames['roleid'] . '" ' . $selected . '>' . $rolename['rolename'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="action" value="exit" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                        <button name="action" value="edit" class="btn btn-success">Sửa</button>
                    </div>
                </form>
            </div>
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