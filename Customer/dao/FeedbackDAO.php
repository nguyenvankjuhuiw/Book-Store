<?php

require_once 'dao/Connect.php';
require_once 'model/Feedback.php';

class FeedbackDAO {
    public function getFeedbackById($id)
    {
        if(empty($id)){
            return null;
        }
        $sql = "select * from feedback where feedbackid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Feedback($each);
    }

    public function getFeedbackByBookid($bookid)
    {
        $sql = "select * from feedback where bookid = '$bookid'";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Feedback($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function insertFeedback($bookid, $userid, $text, $star, $feedbackdate)
    {
        $sql = "INSERT INTO `feedback`(`bookid`, `userid`, `text`, `star`, `feedbackdate`) VALUES ('$bookid', '$userid', '$text', '$star', '$feedbackdate')";
        return (new Connect())->execute($sql);
    }

    public function getFeedbackByUserLimit1($userid)
    {
        $sql = "select * from feedback where userid = '$userid' order by feedbackid desc";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Feedback($each);
    }

    public function addFeedback($bookid, $userid, $text, $star, $feedbackdate)
    {
        $this->insertFeedback($bookid, $userid, $text, $star, $feedbackdate);
        return $this->getFeedbackByUserLimit1($userid);
    }
}