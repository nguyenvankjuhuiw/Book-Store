<?php

require_once 'dao/Connect.php';
require_once 'model/OrderDetail.php';

class OrderDetailDAO {
    public function getOrderDetailByOrderid($id)
    {
        $sql = "select * from orderdetail where orderid = '$id'";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new OrderDetail($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function insertOrderDetail($orderid, $bookid, $quantity)
    {
        $sql = "INSERT INTO `orderdetail`(`orderid`, `bookid`, `quantity`) VALUES ('$orderid', '$bookid', '$quantity')";
        return (new Connect())->execute($sql);
    }

    public function updateOrderDetail($orderid, $bookid, $feedbackid)
    {
        $sql = "update orderdetail set feedbackid = '$feedbackid' where orderid = '$orderid' and bookid = '$bookid'";
        return (new Connect())->execute($sql);
    }

    public function deleteOrderDetail($orderid)
    {
        $sql = "DELETE FROM `orderdetail` WHERE orderid = '$orderid'";
        return (new Connect())->execute($sql);
    }

}