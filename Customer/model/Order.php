<?php

require_once 'dao/TypeShipDAO.php';
require_once 'dao/StatusOrderDAO.php';
require_once 'dao/OrderDetailDAO.php';
require_once 'dao/UserDAO.php';
require_once 'dao/MethodPaymentDAO.php';

class Order {
    private $orderid;
    private $user;
    private $orderdate;
    private $fullname;
    private $phone;
    private $email;
    private $city;
    private $district;
    private $ward;
    private $addressdetail;
    private $totalbook;
    private $typeship;
    private $total;
    private $methodpay;
    private $statusorder;
    private $orderdetail;
    private $statusfeedback;
    private $requestcancel;

    public function __construct($row) {
        $this->orderid = $row['orderid'] ?? null;
        $this->user = (new UserDAO())->getUserById($row['userid']) ?? null;
        $this->orderdate = $row['orderdate'] ?? null;
        $this->fullname = $row['fullname'];
        $this->phone = $row['phone'];
        $this->email = $row['email'];
        $this->city = $row['city'];
        $this->district = $row['district'];
        $this->ward = $row['ward'];
        $this->addressdetail = $row['addressdetail'];
        $this->totalbook = $row['totalbook'] ?? null;
        $this->typeship = (new TypeShipDAO())->getTypeShipById($row['typeshipid']);
        $this->total = $row['total'] ?? null;
        $this->methodpay = (new MethodPaymentDAO())->getMethodPaymentById($row['methodpayid']);
        $this->statusorder = (new StatusOrderDAO())->getStatusOrderById($row['statusorderid']) ?? null;
        $this->orderdetail = (new OrderDetailDAO())->getOrderDetailByOrderid($row['orderid']) ?? null;
        $this->statusfeedback =  $row['statusfeedback'];
        $this->requestcancel =  $row['requestcancel'];
    }

    public function getOrderId(){
        return $this->orderid;
    }

    public function getOrderDate(){
        return $this->orderdate;
    }

    public function getOrderDetail(){
        return $this->orderdetail;
    }

    public function getTotalBook(){
        return $this->totalbook;
    }

    public function getFullName() {
        return $this->fullname;
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

    public function getTypeShip(){
        return $this->typeship;
    }

    public function getTotal(){
        return $this->total;
    }

    public function getMethodPay(){
        return $this->methodpay;
    }

    public function getStatusOrder(){
        return $this->statusorder;
    }

    public function getStatusFeedback(){
        return $this->statusfeedback;
    }

    public function getRequestcancel(){
        return $this->requestcancel;
    }
}