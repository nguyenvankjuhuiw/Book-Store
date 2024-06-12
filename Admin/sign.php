<?php include './config/config.php';?>
<?php include './config/database.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/sign.css" />
    <title>Đăng nhập</title>
    <link rel="icon" href="/assets/img/favicon.png" />
</head>

<?php
        // Đăng nhập
        if (isset($_POST['SignIn'])) {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $sql = "SELECT * FROM user WHERE (username = '$username' OR phone = '$username' OR email = '$username') AND password = sha1('$password') AND roleid = 1";
            $users = Database::GetData($sql);
            if ($users != null) {
                session_start();
                $user = $users[0];
                $_SESSION['username'] = $user['username'];
                $_SESSION['fullname'] = $user['fullname'] == '' ? $user['username'] : $user['fullname'];
                // $_SESSION['Avatar'] = !empty($user['Avatar']) ? $user['Avatar'] : '/assets/img/user.png';
                $_SESSION['role'] = 'admin';
                header('Location: start.php');
            } else {
                $message = "<p style='color: #dc3545'>Tên đăng nhập hoặc mật khẩu không chính xác!</p>";
            }
        }
?>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="#" method="POST" class="sign-in-form">
                    <h2 class="title">Đăng nhập</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="username" type="text" placeholder="Tài khoản / Email / Điện thoại" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="password" type="password" placeholder="Mật khẩu" required />
                    </div>
                    <?=isset($message) ? $message : ''?>
                    <input name="SignIn" type="submit" value="Đăng nhập" class="btn solid" />
                </form>

    <script src="./assets/js/sign.js"></script>
</body>

</html>