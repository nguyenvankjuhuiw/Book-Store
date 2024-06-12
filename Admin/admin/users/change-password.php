<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="icon" href="/assets/img/favicon.png" />
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<?php
    if (isset($_POST['submit'])) {
        $id = (isset($_GET['id'])) ? $_GET['id'] : '';
        $re_pass = (isset($_POST['re-pass'])) ? $_POST['re-pass'] : '';
        $pass_1 = (isset($_POST['pass-1'])) ? $_POST['pass-1'] : '';
        $pass_2 = (isset($_POST['pass-2'])) ? $_POST['pass-2'] : '';
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        #kiểm tra xem nhập mk cũ đã đúng chưa
        $connection = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
            if (!$connection) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
            }
            $sql = "SELECT password FROM user WHERE userid = $id ";
            $result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($result);
            $oldpass = $row["password"] ;
            if ($oldpass != sha1($re_pass)) {
                $message = '<p style="color: #ED5565;">Mật khẩu không đúng</p>';
            }
            else{
                if ($pass_1 == $pass_2 ) {
                    $sql = "UPDATE user SET password = sha1('$pass_1') WHERE userid = $id ";
                    if (mysqli_query($connection, $sql)) {
                            $message = '<p style="color: #48CFAD;">Đổi mật khẩu thành công</p>';
                            header('Location: list.php');
                        }
                        $message = '<p style="color: #ED5565;">Mật khẩu không khớp</p>';
                    }
                }
            }
?>

<body class="profile__bg d-flex-center">
    <img class="profile__avatar" src="<?=$_SESSION['Avatar']?>" alt="Avatar">
    <div class="profile__form">
        <div class="profile__form--header">
            <h3>Đổi mật khẩu</h3>
        </div>
        <form class="profile__form--body" method="POST">
            <div class="profile__group">
                <b>Mật khẩu cũ: </b>
                <input type="password" name="re-pass">
            </div>
            <div class="profile__group">
                <b>Mật khẩu mới: </b>
                <input type="password" name="pass-1">
            </div>
            <div class="profile__group">
                <b>Nhập lại mật khẩu mới: </b>
                <input type="password" name="pass-2">
            </div>
            <div class="profile__group d-flex-center">
                <div>
                <a href="list.php"class="btn btn-info">Huỷ</a>
                    <input class="btn" name="submit" type="submit" value="Đổi mật khẩu">
                </div>
            </div>
        </form>
        <?php
            if (isset($message)) {
                echo '<div class="profile__form--footer">' . $message . '</div>';
            }
        ?>
    </div>
</body>

</html>