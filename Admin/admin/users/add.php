<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\config.php';?>
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\database.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/sign.css" />
    <title>Thêm admin</title>
    <link rel="icon" href="/assets/img/favicon.png" />
</head>
<?php

       if (isset($_POST['action'])&& $_POST['action'] == 'add') {

        $fullname = isset($_POST['fullname']) ? $_POST['fullname']:'';

        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password1 = isset($_POST['password1']) ? $_POST['password1'] : '';
        $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $city = isset($_POST['city'] ) ? $_POST['city'] :'';
        $district = isset($_POST['district'] ) ? $_POST['district'] :'';
        $ward = isset($POST['ward'])  ? $_POST['ward'] :'';
        $addresdetail =  isset($POST['addresdetail'])  ? $_POST['addresdetail'] :'';

        $connection = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
        $sql = "SELECT MAX(userid) as userid FROM user";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $maxid = $row['userid'] ? $row['userid'] + 1 : 1;
        if ($password1 == $password2) {
            $sql = "INSERT INTO user (userid, roleid, fullname, username, password, email, phone, city, district, ward, addressdetail) VALUES ('$maxid', 1, '$fullname', '$username', sha1('$password1'), '$email', '$phone', '$city', '$district', '$ward', '$addresdetail')";
        
            if ($connection) {
                if (mysqli_query($connection, $sql)) {
                    $message = "<p style='color: #0d6efd'>Đăng ký thành công</p>";
                    header("Location: list.php");
                } else {
                    $message = "<p style='color: #dc3545'>Đăng ký thất bại: " . mysqli_error($connection) . "</p>";
                }
            } else {
                $message = "<p style='color: #dc3545'>Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error() . "</p>";
            }
        } else {
            $message = "<p style='color: #dc3545'>Mật khẩu không khớp!</p>";
        }
    }
?>
<body>
<form class="modal-content" method="POST" enctype="multipart/form-data">
    <?=isset($message) ? $message : ''?>
                    <h2 class="title">Thêm addmin</h2>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="fullname" type="text" placeholder="Tên đăng nhập" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="username" type="text" placeholder="Tên đăng nhập" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="password1" type="password" placeholder="Mật khẩu" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="password2" type="password" placeholder="Nhập lại mật khẩu" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input name="email" type="email" placeholder="yourmail@gmail.com" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="phone" type="text" placeholder="Số điện thoại" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="city" type="text" placeholder="Thành phố"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="district" type="text" placeholder="Huyện"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="ward" type="text" placeholder="Phường"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="addressdetail" type="text" placeholder="Địa chỉ cụ thể"/>
                    </div>
                    <div>                 
                    <button name="action" type="submit" class="btn" value="add" >Thêm</button>
                    </div>
                </form>
</body>