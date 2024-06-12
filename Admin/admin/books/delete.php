<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\start.php'?>
<?php include 'C:\xampp\htdocs\BHT-Bookstore-PHP-master\config\Pagination.php' ?>
<?php
// Delete items
    if (isset($_GET['del-id'])) {
        $id = isset($_GET['del-id']) ? $_GET['del-id'] : '';
        $connection = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
        if (!$connection) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }
        $sql1 = "DELETE FROM order
        WHERE orderid IN (
            SELECT orderid
            FROM orderdetail
            WHERE bookid = $id
        )";
        mysqli_query($connection, $sql1);
        $sql2 = "DELETE FROM feedback WHERE bookid = $id";
        mysqli_query($connection, $sql2);
        $sql3 = "DELETE FROM orderdetail WHERE bookid = $id";
        mysqli_query($connection, $sql3);
        $sql5 = "DELETE FROM cart WHERE bookid = $id";
        mysqli_query($connection, $sql5);

        $sql4 = "DELETE FROM book WHERE bookid = $id";
        $connection = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
        if (mysqli_query($connection, $sql4)) {
            echo "Sửa thông tin sách thành công.";
        } else {
            echo "Lỗi khi sửa thông tin sách: " . mysqli_error($connection);
        }
        
        mysqli_close($connection);
    }
?>

<section class="content">
        <?php
            if (isset($message)) {
            echo '<ul class="alert alert-' . $message['type'] . '" style="list-style: none;" role="alert">';
            if (gettype($message['text']) == 'string') {
                echo '<li>' . $message['text'] . '</li>';
            }
            echo '</ul>';
        }
        ?>




        