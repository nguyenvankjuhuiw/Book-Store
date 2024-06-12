<?php

require_once 'dao/Connect.php';
require_once 'model/Role.php';

class RoleDAO {

    public function getRoleById($id)
    {
        $sql = "select * from role where roleid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Role($each);
    }
}