<?php 

class Feedback {
    private $feedbackid;
    private $userid;
    private $text;
    private $star;
    private $feedbackdate;
    
    // Constructor
    public function __construct($row) {
        $this->feedbackid = $row['feedbackid'];
        $this->userid = $row['userid'];
        $this->text = $row['text'];
        $this->star = $row['star'];
        $this->feedbackdate = $row['feedbackdate'];
    }
    
    // Getter và setter cho feedbackid
    public function getFeedbackId() {
        return $this->feedbackid;
    }
    
    public function setFeedbackId($feedbackid) {
        $this->feedbackid = $feedbackid;
    }
    
    // // Getter và setter cho bookid
    // public function getBookId() {
    //     return $this->bookid;
    // }
    
    // public function setBookId($bookid) {
    //     $this->bookid = $bookid;
    // }
    
    // Getter và setter cho userid
    public function getUserId() {
        return $this->userid;
    }
    
    public function setUserId($userid) {
        $this->userid = $userid;
    }
    
    // Getter và setter cho text
    public function getText() {
        return $this->text;
    }
    
    public function setText($text) {
        $this->text = $text;
    }

    public function getStar() {
        return $this->star;
    }

    public function getFeedbackDate() {
        return $this->feedbackdate;
    }
}
