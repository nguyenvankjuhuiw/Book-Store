<?php

require_once 'dao/Connect.php';
require_once 'model/StatusOrder.php';

class StatusOrderDAO {
    public function getStatusOrderById($id)
    {
        $sql = "select * from statusorder where statusorderid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new StatusOrder($each);
    }

    
}