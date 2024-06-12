<?php

require_once 'dao/Connect.php';
require_once 'model/MethodPayment.php';

class MethodPaymentDAO {
    public function getMethodPaymentById($id)
    {
        $sql = "SELECT * FROM `methodpayment` WHERE id = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new MethodPayment($each);
    }

    public function getAllMethodPayment()
    {
        $sql = "SELECT * FROM `methodpayment`";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new MethodPayment($row);
            $arr[] = $each;
        }
        return $arr;
    }
}