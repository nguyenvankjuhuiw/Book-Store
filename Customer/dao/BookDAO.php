<?php

require_once 'dao/Connect.php';
require_once 'model/Book.php';

class BookDAO {
    public function getBookById($id)
    {
        $sql = "select * from book where bookid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Book($each);
    }

    public function getAllBook()
    {
        $sql = "select * from book";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getAllBookLimit8()
    {
        $sql = "select * from book limit 8";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getBookByCateidLimit8($cateid)
    {
        $sql = "select * from book, genre, category WHERE book.genreid = genre.genreid AND genre.cateid = category.cateid AND category.cateid = '$cateid' LIMIT 8";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountAllBook()
    {
        $sql = "select count(*) from book";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getBookByPage($page, $numberbook)
    {
        $numberbookcancel = $numberbook * ($page - 1);
        $sql = "select * from book limit $numberbook offset $numberbookcancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getBookByIdAndKey($cateid, $genreid, $key)
    {
        $conn = (new Connect())->cnt();
        $sql = "select * from book";
        if(isset($cateid)){
            $sql = $sql . ", category, genre where book.genreid = genre.genreid and genre.cateid = category.cateid AND category.cateid = '$cateid'";
        }
        else {
            $sql = $sql . " where ";
        }
        if(isset($genreid)){
            $sql = $sql . "genreid = '$genreid'";
        }
        if(isset($key)){
            $key = mysqli_real_escape_string($conn, $key);
            $sql = $sql . "bookname like '%$key%;'";
        }
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountBookByIdAndKey($cateid, $genreid, $key)
    {
        $conn = (new Connect())->cnt();
        $sql = "select count(*) from book";
        if(isset($cateid)){
            $sql = $sql . ", category, genre where book.genreid = genre.genreid and genre.cateid = category.cateid AND category.cateid = '$cateid'";
        }
        else {
            $sql = $sql . " where ";
        }
        if(isset($genreid)){
            $sql = $sql . "genreid = '$genreid'";
        }
        if(isset($key)){
            $key = mysqli_real_escape_string($conn, $key);
            $sql = $sql . "bookname like '%$key%'";
        }
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getBookByIdAndKeyAndPage($cateid, $genreid, $key, $page, $numberbook)
    {
        $conn = (new Connect())->cnt();
        $numberbookcancel = $numberbook * ($page - 1);
        $sql = "select * from book";
        if(isset($cateid)){
            $sql = $sql . ", category, genre where book.genreid = genre.genreid and genre.cateid = category.cateid AND category.cateid = '$cateid'";
        }
        else {
            $sql = $sql . " where ";
        }
        if(isset($genreid)){
            $sql = $sql . "genreid = '$genreid'";
        }
        if(isset($key)){
            $key = mysqli_real_escape_string($conn, $key);
            $sql = $sql . "bookname like '%$key%'";
        }
        $sql = $sql . " limit $numberbook offset $numberbookcancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountBookByPrice($pricestart, $priceend)
    {
        $sql = "SELECT count(*) FROM `book` WHERE saleprice >= '$pricestart' AND saleprice <= '$priceend'";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getBookByPriceAndPage($page, $numberbook, $pricestart, $priceend)
    {
        $numberbookcancel = $numberbook * ($page - 1);
        $sql = "SELECT * FROM `book` WHERE saleprice >= '$pricestart' AND saleprice <= '$priceend' limit $numberbook offset $numberbookcancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountBookByArrange($type)
    {
        $sql = "SELECT count(*) FROM `book` ORDER BY saleprice ";
        if($type == false){
            $sql = $sql . "ASC";
        }
        else {
            $sql = $sql . "DESC";
        }
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getBookByArrange($page, $numberbook, $type)
    {
        $numberbookcancel = $numberbook * ($page - 1);
        $sql = "SELECT * FROM `book` ORDER BY saleprice ";
        if($type == false){
            $sql = $sql . "ASC";
        }
        else if($type == true) {
            $sql = $sql . "DESC";
        }
        $sql = $sql . "  limit $numberbook offset $numberbookcancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getSellingBooksLimit3()
    {
        $sql = "SELECT * FROM book ORDER BY quantitysale DESC LIMIT 3";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getSellingBooksLimit6()
    {
        $sql = "SELECT * FROM book ORDER BY quantitysale DESC LIMIT 6";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getTotalQuantity()
    {
        $sql = "SELECT SUM(quantity) AS totalquantity FROM book";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['totalquantity'];
    }

    public function getCountSellingBooks()
    {
        $sql = "SELECT count(*) FROM book WHERE quantitysale >= 1 ORDER BY quantitysale DESC";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getSellingBooksByPage($page, $numberbook)
    {
        $numberbookcancel = $numberbook * ($page - 1);
        $sql = "SELECT * FROM book WHERE quantitysale >= 1 ORDER BY quantitysale DESC limit $numberbook offset $numberbookcancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getBookByGenreid($genreid, $bookid)
    {
        $sql = "select * from book where genreid = '$genreid' and bookid != '$bookid'";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function updateQuantity($bookid, $quantity)
    {
        $sql = "update book set quantity = '$quantity' where bookid = '$bookid'";
        return (new Connect())->execute($sql);
    }

    public function updateQuantitySale($bookid, $quantitysale)
    {
        $sql = "update book set quantitysale = '$quantitysale' where bookid = '$bookid'";
        return (new Connect())->execute($sql);
    }

}