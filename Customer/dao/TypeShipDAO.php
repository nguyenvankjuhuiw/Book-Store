<?php

require_once 'dao/Connect.php';
require_once 'model/TypeShip.php';

class TypeShipDAO {
    public function getTypeShipById($id)
    {
        $sql = "select * from typeship where typeshipid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new TypeShip($each);
    }

    public function getAllTypeShip()
    {
        $sql = "select * from typeship";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new TypeShip($row);
            $arr[] = $each;
        }
        return $arr;
    }
}