<?php

require_once 'dao/Connect.php';
require_once 'model/Order.php';

class OrderDAO {
    public function addOrder($params, $paramsbook, $userid, $orderdate, $totalbook, $total)
    {
        require_once 'dao/SendMail.php';
        $address = $params['email'];
        $name = $params['fullname'];
        $title = "Đặt hàng thành công";
        $passtemporary = rand(100000, 999999);
        $statuspay = $params['methodpay'];
        if($params['methodpayid'] == 1){
            $statuspay = "Chưa thanh toán";
        }
        else {
            $statuspay = "Đã thanh toán";
        }
        $content = "
            <h2>Thông tin đơn hàng</h2>
            <table>
                <tr>
                    <th>Tên người nhận: </th>
                    <td>" . $params['fullname'] . "</td>
                </tr>
                <tr>
                    <th>Số điện thoại :</th>
                    <td>" . $params['phone'] . "</td>
                </tr>
                <tr>
                    <th>Địa chỉ: </th>
                    <td>" . $params['addressdetail'] . " - " . $params['ward'] . " - " . $params['district'] . " - " . $params['city'] . "</td>
                </tr>
                <tr>
                    <th>Tổng tiền: </th>
                    <td>" . number_format($total) . " VND " . "</td>
                </tr>
                <tr>
                    <th>Trạng thái thanh toán: </th>
                    <td>" . $statuspay . "</td>
                </tr>
            </table>
        ";
        $check = (new SendMail())->sendMailByAddress($address, $name, $title, $content);
        if($check == false){
            header('location:?route=register&error=2');
            exit();
        }

        $this->insertOrder($params, $userid, $orderdate, $totalbook, $total);
        $order = $this->getOrderByUseridLimit1($userid);
        foreach ($paramsbook as $bookid => $quantity) {
            (new OrderDetailDAO())->insertOrderDetail($order->getOrderId(), $bookid, $quantity);
            (new CartDAO())->deleteCart($userid, $bookid);
            $book = (new BookDAO())->getBookById($bookid);
        }
        $order = $this->getOrderByUseridLimit1($userid);
        return $order;
    }
    
    public function insertOrder($params, $userid, $orderdate, $totalbook, $total)
    {
        $conn = (new Connect())->cnt();

        // Chuẩn bị câu truy vấn với các placeholder
        $stmt = $conn->prepare("INSERT INTO `order` (`userid`, `orderdate`, `fullname`, `phone`, `email`, `city`, `district`, `ward`, `addressdetail`, `totalbook`, `typeshipid`, `total`, `methodpayid`, `statusorderid`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Xác định các biến ràng buộc
        $fullname = $params['fullname'];
        $phone = $params['phone'];
        $email = $params['email'];
        $city = $params['city'];
        $district = $params['district'];
        $ward = $params['ward'];
        $addressdetail = $params['addressdetail'];
        $typeshipid = $params['typeshipid'];
        $methodpayid = $params['methodpayid'];
        $statusorderid = 1;

        // Ràng buộc các biến với các placeholder
        $stmt->bind_param("issssssssiiiii", $userid, $orderdate, $fullname, $phone, $email, $city, $district, $ward, $addressdetail, $totalbook, $typeshipid, $total, $methodpayid, $statusorderid);

        // Thực thi câu truy vấn
        $stmt->execute();

        // Kiểm tra lỗi và đóng statement
        $error = $stmt->error;
        $stmt->close();

        return $error;
    }


    public function getOrderByUseridLimit1($userid)
    {
        $sql = "select * from `order` where userid = '$userid' order by orderid desc limit 1";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Order($each);
    }

    public function getOrderById($id)
    {
        $sql = "select * from `order` where orderid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Order($each);
    }

    public function getOrderByUseridAndStatus($userid, $statusorderid=null)
    {
        $sql = "select * from `order` where statusorderid != 5 AND userid = '$userid'";
        if(isset($statusorderid)){
            $sql = $sql . " and statusorderid = '$statusorderid'";
        }
        $sql = $sql . " order by orderid desc";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Order($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getOrderByUseridAndCancel($userid)
    {
        $sql = "select * from `order` where statusorderid = 5 AND userid = '$userid'";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Order($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function checkStatusFeedback($orderid)
    {
        $order = $this->getOrderById($orderid);
        $listorderdetail = $order->getOrderDetail();
        foreach($listorderdetail as $orderdetail){
            if(empty($orderdetail->getFeedback())){
                return false;
            }
        }
        return true;
    }

    public function updateStatusFeedback($orderid)
    {
        $sql = "update `order` set statusfeedback = '1' where orderid = '$orderid'";
        return (new Connect())->execute($sql);
    }

    public function deleteOrder($orderid)
    {
        (new OrderDetailDAO())->deleteOrderDetail($orderid);
        $sql = "DELETE FROM `order` WHERE orderid = '$orderid'";
        return (new Connect())->execute($sql);
    }

    public function updateCancel($orderid)
    {
        $sql = "UPDATE `order` SET `statusorderid`='5' WHERE orderid = '$orderid'";
        return (new Connect())->execute($sql);
    }

    public function updateRequestCancel($orderid)
    {
        $sql = "UPDATE `order` SET `requestcancel`='1' WHERE orderid = '$orderid'";
        return (new Connect())->execute($sql);
    }

    public function updateComplete($orderid)
    {
        $sql = "UPDATE `order` SET `statusorderid` = '4' WHERE `order`.`orderid` = '$orderid'";
        return (new Connect())->execute($sql);
    }
}