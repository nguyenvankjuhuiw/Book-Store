<?php

require_once 'dao/Connect.php';
require_once 'model/Genre.php';

class GenreDAO {
    public function getGenreById($id)
    {
        $sql = "select * from genre where genreid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Genre($each);
    }

    public function getGenreByCateid($id)
    {
        $sql = "select * from genre where cateid = '$id'";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Genre($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountBookById($id)
    {
        $sql = "SELECT COUNT(*) FROM `book`, genre WHERE book.genreid = genre.genreid AND genre.genreid = '$id'";
        $result = (new Connect())->select($sql);
        $row = mysqli_fetch_array($result);
        return $row['COUNT(*)'];
    }
}