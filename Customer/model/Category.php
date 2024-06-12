<?php

class Category {
    private $cateid;
    private $catename;

    public function __construct($row) {
        $this->cateid = $row['cateid'];
        $this->catename = $row['catename'];
    }

    // Getter for cateid
    public function getCateid() {
        return $this->cateid;
    }

    // Setter for cateid
    public function setCateid($cateid) {
        $this->cateid = $cateid;
    }

    // Getter for catename
    public function getCatename() {
        return $this->catename;
    }

    // Setter for catename
    public function setCatename($catename) {
        $this->catename = $catename;
    }
}
