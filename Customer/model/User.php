<?php

require_once 'dao/RoleDAO.php';
require_once 'dao/CartDAO.php';

class User {
    private $userid;
    private $roleid;
    private $fullname;
    private $username;
    private $password;
    private $email;
    private $phone;
    private $city;
    private $district;
    private $ward;
    private $addressdetail;
    private $cart;

    public function __construct($row) {
        $this->userid = $row['userid'];
        $this->roleid = (new RoleDAO())->getRoleById($row['roleid']);
        $this->fullname = $row['fullname'];
        $this->username = $row['username'];
        $this->password = $row['password'];
        $this->email = $row['email'];
        $this->phone = $row['phone'] ?? null;
        $this->city = $row['city'] ?? null;
        $this->district = $row['district'] ?? null;
        $this->ward = $row['ward'] ?? null;
        $this->addressdetail = $row['addressdetail'] ?? null;
        $this->cart = (new CartDAO())->getCartByUserid($row['userid']);
    }

    // Getter methods
    public function getUserId() {
        return $this->userid;
    }

    public function getRoleId() {
        return $this->roleid;
    }

    public function getFullName() {
        return $this->fullname;
    }

    public function getUserName() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getCity() {
        return $this->city;
    }

    public function getDistrict() {
        return $this->district;
    }

    public function getWard() {
        return $this->ward;
    }

    public function getAddressDetail() {
        return $this->addressdetail;
    }

    public function getCart() {
        return $this->cart;
    }

    // Setter methods
    public function setUserId($userid) {
        $this->userid = $userid;
    }

    public function setRoleId($roleid) {
        $this->roleid = $roleid;
    }

    public function setFullName($fullname) {
        $this->fullname = $fullname;
    }

    public function setUserName($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setDistrict($district) {
        $this->district = $district;
    }

    public function setWard($ward) {
        $this->ward = $ward;
    }

    public function setAddressDetail($addressdetail) {
        $this->addressdetail = $addressdetail;
    }
}
