<?php
class Helper
{

    public static function phone($str)
    {
        if (strlen($str) == 11) {
            return substr($str, 0, 5) . ' ' . substr($str, 5, 3) . ' ' . substr($str, 8, 3);
        } else if (strlen($str) == 10) {
            return substr($str, 0, 4) . ' ' . substr($str, 4, 3) . ' ' . substr($str, 7, 3);
        }
        return '';
    }

    public static function Date($str)
    {
        return date('d/m/Y', strtotime($str));
    }

    public static function DateTime($str)
    {
        return date('d/m/Y H:i:s', strtotime($str));
    }

    public static function StatusBadge($value)
    {
        return $value == 1 ? "<span class='badge badge-success'>Hoạt động</span>" : "<span class='badge badge-danger'>Khóa</span>";
    }

    public static function PaymentBadge($value)
    {
        return $value == 1 ? "<span class='badge badge-success'>Đã thanh toán</span>" : "<span class='badge badge-warning'>Chưa thanh toán</span>";
    }

    public static function role($value)
    {
        if ($value == 1) {
            return "<span class='badge badge-success'>Quản trị viên</span>";
        }
        else {
            return "<span class='badge badge-dark'>Người dùng</span>";
        }
    }
    public static function typeshipname($value)
    {
        $conn = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT typeshipid, typeshipname FROM typeship";
        $result = $conn->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[$row["typeshipid"]] = $row["typeshipname"];
            }
        }

        $conn->close();
        return $data[$value];
    }
    public static function typeshipprice($value)
    {
        $conn = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT typeshipid, price FROM typeship";
        $result = $conn->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[$row["typeshipid"]] = $row["price"];
            }
        }

        $conn->close();
        return $data[$value];
    }
    public static function orderstatus($value)
    {
        $conn = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM statusorder";
        $result = $conn->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[$row["statusorderid"]] = $row["statusordername"];
            }
        }

        $conn->close();
        return $data[$value];
    }
    public static function statusfeedback($value)
    {
        if ($value == 1) {
            return "Đã phản hồi";
        }
        else {
            return "Chưa phản hồi";
        }
    }
    public static function product($value)
    {
        $conn = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT bookname FROM book WHERE bookid =(SELECT bookid FROM orderdetail  Where orderid= $value)";
        $data = Database::GetData($sql);
        
        $conn->close();

        return $data;
    }
    
    public static function quantity($value)
    {
        $conn = mysqli_connect("localhost:3307", "root", "27112002", "bookstore");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT quantity FROM orderdetail  Where orderid= $value";
        $result = $conn->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        $conn->close();
        return $data;
    }
    
}
