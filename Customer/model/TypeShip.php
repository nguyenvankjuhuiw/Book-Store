<?php

class TypeShip {
    private $typeshipid;
    private $typeshipname;
    private $price;

    // Constructor
    public function __construct($row) {
        $this->typeshipid = $row['typeshipid'];
        $this->typeshipname = $row['typeshipname'];
        $this->price = $row['price'];
    }

    // Getter cho typeshipid
    public function getTypeShipId() {
        return $this->typeshipid;
    }

    // Setter cho typeshipid
    public function setTypeShipId($typeshipid) {
        $this->typeshipid = $typeshipid;
    }

    // Getter cho typeshipname
    public function getTypeShipName() {
        return $this->typeshipname;
    }

    // Setter cho typeshipname
    public function setTypeShipName($typeshipname) {
        $this->typeshipname = $typeshipname;
    }

    public function getPrice() {
        return $this->price;
    }
}
