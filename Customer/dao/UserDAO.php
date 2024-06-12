<?php

require_once 'dao/Connect.php';
require_once 'model/User.php';

class UserDAO {
    public function checkUser($username, $password=null)
    {
        $conn = (new Connect())->cnt();
        $username = mysqli_real_escape_string($conn, $username);

        $sql = "SELECT * FROM user WHERE username = '$username'";
    
        if(isset($password)){
            // Làm sạch đầu vào password
            $password = mysqli_real_escape_string($conn, $password);
            $sql = $sql . " AND password = '$password'";
        }
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new User($each);
    }

    public function insertUser($params)
    {
        $conn = (new Connect())->cnt();
        
        // Chuẩn bị câu truy vấn với các placeholder
        $stmt = $conn->prepare("INSERT INTO user (roleid, fullname, username, password, email, phone) VALUES (?, ?, ?, ?, ?, ?)");
        
        // Xác định các biến ràng buộc
        $roleid = 2;
        $fullname = $params['fullname'];
        $username = $params['username'];
        $password = $params['password'];
        $email = $params['email'];
        $phone = $params['phone'];
        
        // Ràng buộc các biến với các placeholder
        $stmt->bind_param("isssss", $roleid, $fullname, $username, $password, $email, $phone);
        
        // Thực thi câu truy vấn
        $stmt->execute();
        
        // Kiểm tra lỗi và đóng statement
        $error = $stmt->error;
        $stmt->close();
        
        return $error;
    }


    public function getUserById($id)
    {
        $sql = "select * from user where userid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new User($each);
    }

    public function updateUser($params, $userid)
    {
        $conn = (new Connect())->cnt();

        // Chuẩn bị câu truy vấn với các placeholder
        $stmt = $conn->prepare("UPDATE `user` SET `fullname`=?, `email`=?, `phone`=?, `city`=?, `district`=?, `ward`=?, `addressdetail`=? WHERE userid=?");
        
        // Xác định các biến ràng buộc
        $fullname = $params['fullname'];
        $email = $params['email'];
        $phone = $params['phone'];
        $city = $params['city'];
        $district = $params['district'];
        $ward = $params['ward'];
        $addressdetail = $params['addressdetail'];
        
        // Ràng buộc các biến với các placeholder
        $stmt->bind_param("sssssssi", $fullname, $email, $phone, $city, $district, $ward, $addressdetail, $userid);
        
        // Thực thi câu truy vấn
        $stmt->execute();
        
        // Kiểm tra lỗi và đóng statement
        $error = $stmt->error;
        $stmt->close();
        
        return $error;
    }


    public function checkPassword($userid, $password)
    {
        $conn = (new Connect())->cnt();

        // Chuẩn bị câu truy vấn với các placeholder
        $stmt = $conn->prepare("SELECT COUNT(*) FROM `user` WHERE userid = ? AND password = ?");

        // Ràng buộc các biến với các placeholder
        $stmt->bind_param("is", $userid, $password); // 'is' xác định rằng userid là số nguyên và password là chuỗi

        // Thực thi câu truy vấn
        $stmt->execute();

        // Lấy kết quả
        $stmt->bind_result($count);
        $stmt->fetch();

        // Đóng statement
        $stmt->close();

        return $count;
    }


    public function updatePassword($userid, $password)
    {
        $conn = (new Connect())->cnt();

        // Chuẩn bị câu truy vấn với các placeholder
        $stmt = $conn->prepare("UPDATE `user` SET `password`=? WHERE userid=?");

        // Ràng buộc các biến với các placeholder
        $stmt->bind_param("si", $password, $userid); // 'si' xác định rằng password là chuỗi và userid là số nguyên

        // Thực thi câu truy vấn
        $stmt->execute();

        // Kiểm tra lỗi và đóng statement
        $error = $stmt->error;
        $stmt->close();

        return $error;
    }


    public function getCountAllUser()
    {
        $sql = "SELECT COUNT(*) FROM user WHERE roleid = 2";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['COUNT(*)'];
    }
    
 
}