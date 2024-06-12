<?php 

require_once 'dao/Connect.php';
require_once 'model/Notification.php';

class NotificationDAO {

    public function insertNotification($userid, $note, $orderid=null)
    {
        $datenoti = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `notification`(`userid`, `date`, `note`, `orderid`) VALUES ('$userid', '$datenoti', '$note', '$orderid')";
        return (new Connect())->execute($sql);
    }

    public function getNotificationByUserId($userid)
    {
        $sql = "SELECT * FROM `notification` WHERE userid = '$userid' ORDER BY id DESC";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Notification($row);
            $arr[] = $each;
        }
        return $arr;
    }
}