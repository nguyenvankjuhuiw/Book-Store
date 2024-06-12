<?php

class StatusOrder {
    private $statusorderid;
    private $statusordername;

    // Constructor
    public function __construct($row) {
        $this->statusorderid = $row['statusorderid'];
        $this->statusordername = $row['statusordername'];
    }

    // Getter và setter cho thuộc tính $statusorderid
    public function getStatusOrderId() {
        return $this->statusorderid;
    }

    public function setStatusOrderId($statusorderid) {
        $this->statusorderid = $statusorderid;
    }

    // Getter và setter cho thuộc tính $statusordername
    public function getStatusOrderName() {
        return $this->statusordername;
    }

    public function setStatusOrderName($statusordername) {
        $this->statusordername = $statusordername;
    }
}
