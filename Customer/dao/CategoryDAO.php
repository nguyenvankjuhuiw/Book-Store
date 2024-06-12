<?php

require_once 'dao/Connect.php';
require_once 'model/Category.php';

class CategoryDAO {
    public function getCategoryById($id)
    {
        $sql = "select * from category where cateid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Category($each);
    }

    public function getAllCategory()
    {
        $sql = "select * from category";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Category($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountBookById($id)
    {
        $sql = "SELECT COUNT(*) FROM `book`, genre, category WHERE book.genreid = genre.genreid AND genre.cateid = category.cateid AND category.cateid = '$id'";
        $result = (new Connect())->select($sql);
        $row = mysqli_fetch_array($result);
        return $row['COUNT(*)'];
    }
}