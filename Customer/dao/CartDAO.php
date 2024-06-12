<?php

require_once 'dao/Connect.php';
require_once 'model/Cart.php';

class CartDAO {
    public function getCartByUserid($id)
    {
        $sql = "select * from cart where userid = '$id'";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Cart($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCartByUseridAndCheckbox($id)
    {
        $sql = "select * from cart where userid = '$id' and checkbox = '1'";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Cart($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function addCart($userid, $bookid, $quantity=1)
    {
        $cart_old = $this->getCart($userid, $bookid);
        if($cart_old == null){
            return $this->insertCart($userid, $bookid, $quantity);
        }
        $quantity_old = $cart_old->getQuantity();
        $quantity_new = $quantity_old + $quantity;
        return $this->updateCart($userid, $bookid, $quantity_new);
    }

    public function insertCart($userid, $bookid, $quantity)
    {
        $sql = "insert into Cart (userid, bookid, quantity) values ('$userid', '$bookid', '$quantity')";
        return (new Connect())->execute($sql);
    }

    public function updateCart($userid, $bookid, $quantity)
    {
        $sql = "update cart set quantity = '$quantity' where userid = '$userid' and bookid = '$bookid'";
        if($quantity == 0){
            return $this->deleteCart($userid, $bookid);
        }
        return (new Connect())->execute($sql);
    }

    public function getCart($userid, $bookid)
    {
        $sql = "select * from cart where userid = '$userid' and bookid = '$bookid'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Cart($each);
    }

    public function deleteCart($userid, $bookid)
    {
        $sql = "delete from cart where userid = '$userid' and bookid = '$bookid'";
        return (new Connect())->execute($sql);
    }

    public function updateCheckbox($userid, $bookid, $checkbox)
    {
        $sql = "update cart set checkbox = ";
        if(isset($checkbox)){
            $sql = $sql . "'1'";
        }
        else {
            $sql = $sql . "'0'";
        }
        $sql = $sql . " where userid = '$userid' and bookid = '$bookid'";
        return (new Connect())->execute($sql);
    }
}