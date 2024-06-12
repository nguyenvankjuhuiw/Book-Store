<?php

class CartController {
    public function addcartinbook($userid, $bookid)
    {
        require 'dao/CartDAO.php';
        (new CartDAO())->addCart($userid, $bookid);
        header('location:?route=book');
    }

    public function addcartinbookdetail($userid, $bookid, $quantity)
    {
        require 'dao/CartDAO.php';
        (new CartDAO())->addCart($userid, $bookid, $quantity);
        header('location:?route=bookdetail&bookid=' . $bookid);
    }

    public function addcartsimilarbook($userid, $bookid, $similarbookid)
    {
        require 'dao/CartDAO.php';
        (new CartDAO())->addCart($userid, $similarbookid);
        header('location:?route=bookdetail&bookid=' . $bookid);
    }

    public function cart($userid)
    {
        require 'dao/CartDAO.php';
        $listcart = (new CartDAO())->getCartByUserid($userid);
        require 'view/templates/CartFrm.php';
    }

    public function updatecart($userid, $bookid, $quantity)
    {
        require 'dao/CartDAO.php';
        (new CartDAO())->updateCart($userid, $bookid, $quantity);
        header('location:?route=cart');
    }

    public function deletecart($userid, $bookid)
    {
        require 'dao/CartDAO.php';
        (new CartDAO())->deleteCart($userid, $bookid);
        header('location:?route=cart');
    }

    public function checkboxincart($userid, $bookid, $checkbox)
    {
        require 'dao/CartDAO.php';
        (new CartDAO())->updateCheckbox($userid, $bookid, $checkbox);
        header('location:?route=cart');
    }
}