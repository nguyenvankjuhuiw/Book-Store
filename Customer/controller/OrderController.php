<?php

class OrderController {
    public function checkout($userid)
    {
        require 'dao/CartDAO.php';
        require 'dao/TypeShipDAO.php';
        require 'dao/MethodPaymentDAO.php';
        $listcart = (new CartDAO())->getCartByUseridAndCheckbox($userid);
        if(sizeof($listcart) == 0){
            header('location:?route=cart');
            exit();
        }
        foreach($listcart as $cart){
            if($cart->getQuantity() > $cart->getBook()->getQuantity()){
                header('location:?route=cart');
                exit();
            }
        }
        $listtypeship = (new TypeShipDAO())->getAllTypeShip();
        $listmethodpay = (new MethodPaymentDAO())->getAllMethodPayment();
        require 'view/templates/CheckoutFrm.php';
    }

    public function doorder($userid, $params)
    {
        require 'dao/OrderDAO.php';
        $listcartcheck = (new CartDAO())->getCartByUseridAndCheckbox($userid);
        $totalbook = 0;
        $paramsbook = [];
        foreach($listcartcheck as $cart){
            $totalbook = $totalbook + $cart->getBook()->getSalePrice() * $cart->getQuantity();
            $paramsbook[$cart->getBook()->getBookId()] = $cart->getQuantity();
        }           
        $typeship = (new TypeShipDAO())->getTypeShipById($params['typeshipid']);
        $total = $totalbook + $typeship->getPrice();
        if($params['methodpayid'] == 1){
            $orderdate = date("Y-m-d H:i:s");
            $order = (new OrderDAO())->addOrder($params, $paramsbook, $userid, $orderdate, $totalbook, $total);
            header('location:?route=historyorder');
            exit();
        }
        else if ($params['methodpayid'] == 2) {
            session_start();
            $_SESSION['params'] = serialize($params);
            header('location:?route=payonline&amount=' . $total);
            exit();
        }
        else {
            session_start();
            $_SESSION['params'] = serialize($params);
            $location = '?route=payonlineqr&amount=' . $total . "&priceship=" . $typeship->getPrice() . "&totalbook=" . $totalbook;
            header('location:' . $location);
            exit();
        }
    }

    public function ordercancel($userid, $orderid)
    {
        require 'dao/NotificationDAO.php';
        (new OrderDAO())->updateCancel($orderid);
        $note = "Bạn đã hủy đơn hàng thành công!";
        (new NotificationDAO())->insertNotification($userid, $note, $orderid);
        header('location:?route=notificationview');
    }

    public function requestcancel($userid, $orderid)
    {
        require 'dao/NotificationDAO.php';
        (new OrderDAO())->updateRequestCancel($orderid);
        $note = "Bạn đã gửi yêu cầu hủy đơn hàng!";
        (new NotificationDAO())->insertNotification($userid, $note, $orderid);
        header('location:?route=notificationview');
    }

    public function complete($orderid)
    {
        require 'dao/OrderDAO.php';
        (new OrderDAO())->updateComplete($orderid);
        header('location:?route=historyorder');
    }

    public function payonline($amount)
    {
        require 'dao/ConfigPayOnline.php';
        $vnp_TxnRef = rand(1,10000);
        $vnp_Amount = $amount;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount* 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD: " . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        header('Location: ' . $vnp_Url);
    }

    public function payonlineqr($amount, $priceship, $totalbook)
    {
        

        $bank = new stdClass();
        $bank->BANK_ID = "BIDV"; 
        $bank->ACCOUNT_NO = "1160685738"; 
        $bank->TEMPLATE = "qr_only";
        $bank->AMOUNT = $amount; 
        $bank->DESCRIPTION = bin2hex(random_bytes(8)); 
        $bank->ACCOUNT_NAME = "NGUYEN THI LOAN";

        $image_url = "https://img.vietqr.io/image/{$bank->BANK_ID}-{$bank->ACCOUNT_NO}-{$bank->TEMPLATE}.png?amount={$bank->AMOUNT}&addInfo=" . urlencode($bank->DESCRIPTION) . "&accountName=" . urlencode($bank->ACCOUNT_NAME);
        
        $API_KEY = "AK_CS.f0aa5510152611efb59ad709086e66d7.80HycLCzHtd9j08bGuYd86zXxSbQm311ioJ7OL42TXDxwRuxa5EFSJ6YpuDAUHiCy3mmwgyc";

        require 'view/templates/PayOnlineQRFrm.php';
    }  

    public function addorderpayonline($inforreturn, $params, $userid)
    {
        require 'dao/ConfigPayOnline.php';
        $vnp_SecureHash = $inforreturn['vnp_SecureHash'];
        $inputData = array();
        foreach ($inforreturn as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash == $vnp_SecureHash and $inforreturn['vnp_ResponseCode'] == '00') {
            require 'dao/OrderDAO.php';
            $listcartcheck = (new CartDAO())->getCartByUseridAndCheckbox($userid);
            $totalbook = 0;
            $paramsbook = [];
            $listorderdetail = [];
            foreach($listcartcheck as $cart){
                $totalbook = $totalbook + $cart->getBook()->getSalePrice() * $cart->getQuantity();
                $paramsbook[$cart->getBook()->getBookId()] = $cart->getQuantity();
                $orderdetail = new OrderDetail();
                $orderdetail->setBook($cart->getBook());
                $orderdetail->setQuantity($cart->getQuantity());
                $listorderdetail[] = $orderdetail;
            }           
            $typeship = (new TypeShipDAO())->getTypeShipById($params['typeshipid']);
            $total = $totalbook + $typeship->getPrice();
            $dateString = $inforreturn['vnp_PayDate'];
            $timestamp = strtotime($dateString);
            $orderdate = date("Y-m-d H:i:s", $timestamp);
            $order = (new OrderDAO())->addOrder($params, $paramsbook, $userid, $orderdate, $totalbook, $total);
            $orderid = $order->getOrderId();
        }

        header('location:?route=returnpayonline');
    }

    public function addorderpayonlineqr($params, $userid)
    {
        require 'dao/OrderDAO.php';
        $listcartcheck = (new CartDAO())->getCartByUseridAndCheckbox($userid);
        $totalbook = 0;
        $paramsbook = [];
        $listorderdetail = [];
        foreach($listcartcheck as $cart){
            $totalbook = $totalbook + $cart->getBook()->getSalePrice() * $cart->getQuantity();
            $paramsbook[$cart->getBook()->getBookId()] = $cart->getQuantity();
            $orderdetail = new OrderDetail();
            $orderdetail->setBook($cart->getBook());
            $orderdetail->setQuantity($cart->getQuantity());
            $listorderdetail[] = $orderdetail;
        }           
        $typeship = (new TypeShipDAO())->getTypeShipById($params['typeshipid']);
        $total = $totalbook + $typeship->getPrice();
        $orderdate = date("Y-m-d H:i:s");
        $order = (new OrderDAO())->addOrder($params, $paramsbook, $userid, $orderdate, $totalbook, $total);
        $orderid = $order->getOrderId();
        header('location:?route=payonlineqrreturn');
    }
    
    public function payonlineqrreturn($error)
    {
        $title = "GIAO DỊCH THÀNH CÔNG!";
        if($error == 1){
            $title = "GIAO DỊCH THẤT BẠI!";
        }
        require 'view/templates/PayOnlineQRReturnFrm.php';
    }

    public function returnpayonline($inforreturn)
    {
        require 'dao/ConfigPayOnline.php';
        $vnp_SecureHash = $inforreturn['vnp_SecureHash'];
        $inputData = array();
        foreach ($inforreturn as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        require 'view/templates/PayOnlineReturnFrm.php';
    }

    public function infororder($orderid)
    {
        require 'dao/OrderDAO.php';
        $order = (new OrderDAO())->getOrderById($orderid);
        require 'view/templates/OrderFrm.php';
    }

    public function historyorder($userid)
    {
        require 'dao/OrderDAO.php';
        $listallorder = (new OrderDAO())->getOrderByUseridAndStatus($userid);
        $listorder1 = (new OrderDAO())->getOrderByUseridAndStatus($userid, 1);
        $listorder2 = (new OrderDAO())->getOrderByUseridAndStatus($userid, 2);
        $listorder3 = (new OrderDAO())->getOrderByUseridAndStatus($userid, 3);
        $listorder4 = (new OrderDAO())->getOrderByUseridAndStatus($userid, 4);
        require 'view/templates/HistoryOrderFrm.php';
    }

    public function ordercancelview($userid)
    {
        require 'dao/OrderDAO.php';
        $listallorder = (new OrderDAO())->getOrderByUseridAndCancel($userid);
        require 'view/templates/OrderCancelViewFrm.php';
    }

    public function feedback($orderid)
    {
        require 'dao/OrderDAO.php';
        $order = (new OrderDAO())->getOrderById($orderid);
        require 'view/templates/FeedbackFrm.php';
    }

    public function dofeedback($orderid, $bookid, $userid, $text, $star)
    {
        require 'dao/OrderDAO.php';
        $feedbackdate =  date("Y-m-d H:i:s");
        $feedback = (new FeedbackDAO())->addFeedback($bookid, $userid, $text, $star, $feedbackdate);
        (new OrderDetailDAO())->updateOrderDetail($orderid, $bookid, $feedback->getFeedbackId());
        $check = (new OrderDAO())->checkStatusFeedback($orderid);
        if($check){
            (new OrderDAO())->updateStatusFeedback($orderid);
        }
        header('location:?route=feedback&orderid=' . $orderid);
    }

    public function notificationview($userid)
    {
        require 'dao/NotificationDAO.php';
        $listnotification = (new NotificationDAO())->getNotificationByUserId($userid);
        require 'view/templates/NotificationFrm.php';
    }
}