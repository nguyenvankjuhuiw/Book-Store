<?php

require_once 'dao/CategoryDAO.php';

class Genre {
    private $genreid;
    private $cate;
    private $genrename;

    public function __construct($row) {
        $this->genreid = $row['genreid'];
        $this->cate = (new CategoryDAO())->getCategoryById($row['cateid']);
        $this->genrename = $row['genrename'];
    }

    // Getter for genreid
    public function getGenreid() {
        return $this->genreid;
    }

    // Setter for genreid
    public function setGenreid($genreid) {
        $this->genreid = $genreid;
    }

    // Getter for cateid
    public function getCate() {
        return $this->cate;
    }

    // Setter for cateid
    public function setCate($cate) {
        $this->cate = $cate;
    }

    // Getter for genrename
    public function getGenrename() {
        return $this->genrename;
    }

    // Setter for genrename
    public function setGenrename($genrename) {
        $this->genrename = $genrename;
    }
}
