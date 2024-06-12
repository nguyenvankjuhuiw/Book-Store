<?php

require_once 'controller/HomeController.php';
require_once 'controller/CartController.php';
require_once 'controller/OrderController.php';

$route = $_GET['route'] ?? 'home';
session_start();

switch ($route) {
    case 'home':
        (new HomeController())->home();
        break;
    case 'book':
        $page = 1;
        $cateid = null;
        $genreid = null;
        $key = null;
        $sellingbook = null;
        $pricestart = null;
        $priceend = null;
        $selectid = null;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        if(isset($_GET['cateid'])){
            $cateid = $_GET['cateid'];
        }
        if(isset($_GET['genreid'])){
            $genreid = $_GET['genreid'];
        }
        if(isset($_GET['sellingbook'])){
            $sellingbook = $_GET['sellingbook'];
        }
        if(isset($_POST['key'])){
            $key = $_POST['key'];
        }
        if(isset($_POST['pricestart'])){
            $pricestart = $_POST['pricestart'];
            $priceend = $_POST['priceend'];
        }
        if(isset($_POST['selectid'])){
            $selectid = $_POST['selectid'];
        }
        (new HomeController())->book($page, $cateid, $genreid, $sellingbook, $key, $pricestart, $priceend, $selectid);
        break;
    case 'bookdetail':
        $bookid = $_GET['bookid'];
        (new HomeController())->bookdetail($bookid);
        break;
    case 'login':
        $error = null;
        if(isset($_GET['error'])){
            $error = $_GET['error'];
        }
        (new HomeController())->login($error);
        break;
    case 'dologin':
        $username = $_POST['username'];
        $password = $_POST['password'];
        (new HomeController())->dologin($username, $password);
        break;
    case 'register':
        $error = null;
        if(isset($_GET['error'])){
            $error = $_GET['error'];
        }
        (new HomeController())->register($error);
        break;
    case 'doregister':
        (new HomeController())->doregister($_POST);
        break;
    case 'profile':
        (new HomeController())->profile();
        break;
    case 'logout':
        (new HomeController())->logout();
        break;
    case 'updateprofile':
        (new HomeController())->updateprofile();
        break;
    case 'doupdateprofile':
        (new HomeController())->doupdateprofile($_POST, $_SESSION['userid']);
        break;
    case 'forgetpassword':
        $error = null;
        if(isset($_GET['error'])){
            $error = $_GET['error'];
        }
        (new HomeController())->forgetpassword($error);
        break;
    case 'doforgetpassword':
        $username = null;
        if(isset($_POST['username'])){
            $username = $_POST['username'];
        }
        (new HomeController())->doforgetpassword($username);
        break;
    case 'passtemporary':
        $error = null;
        if(isset($_GET['error'])){
            $error = $_GET['error'];
        }
        (new HomeController())->passtemporary($_GET['username'], $error);
        break;
    case 'dopasstemporary':
        (new HomeController())->dopasstemporary($_GET['username'], $_POST['password'], $_SESSION['passtemporary']);
        break;
    case 'passnew':
        unset($_SESSION['passtemporary']);
        (new HomeController())->passnew($_GET['username']);
        break;
    case 'dopassnew':
        (new HomeController())->dopassnew($_GET['username'], $_POST['password']);
        break;
    case 'changepassword':
        $error = null;
        $success = null;
        if(isset($_GET['error'])){
            $error = $_GET['error'];
        }
        if(isset($_GET['success'])){
            $success = $_GET['success'];
        }
        (new HomeController())->changepassword($error, $success);
        break;
    case 'dochangepassword':
        (new HomeController())->dochangepassword($_SESSION['userid'], $_POST['password1'], $_POST['password2']);
        break;
    case 'contact':
        $error = null;
        if(isset($_GET['error'])){
            $error = $_GET['error'];
        }
        (new HomeController())->contact($error);
        break;   
    case 'docontact':
        (new HomeController())->docontact($_POST['name'], $_POST['email'], $_POST['mess']);
        break; 
    case 'errorpage':
        (new HomeController())->errorpage();
        break;   
    case 'addcartinbook':
        $userid = null;
        if(isset($_SESSION['userid'])){
            $userid = $_SESSION['userid'];
            (new CartController())->addcartinbook($userid, $_GET['bookid']);
        }
        else {
            header('location:/BookStore/?route=login');
        }
        break;
    case 'addcartinbookdetail':
        $userid = null;
        if(isset($_SESSION['userid'])){
            $userid = $_SESSION['userid'];
            (new CartController())->addcartinbookdetail($userid, $_POST['bookid'], $_POST['quantity']);
        }
        else {
            header('location:/BookStore/?route=login');
        }
        break;
    case 'addcartsimilarbook':
        $userid = null;
        if(isset($_SESSION['userid'])){
            $userid = $_SESSION['userid'];
            (new CartController())->addcartsimilarbook($userid, $_GET['bookid'], $_GET['similarbookid']);
        }
        else {
            header('location:/BookStore/?route=login');
        }
        break;
    case 'cart':
        $userid = null;
        if(isset($_SESSION['userid'])){
            $userid = $_SESSION['userid'];
            (new CartController())->cart($userid);
        }
        else {
            header('location:/BookStore/?route=login');
        }
        break;
    case 'updatecart':
        (new CartController())->updatecart($_SESSION['userid'], $_POST['bookid'], $_POST['quantity']);
        break;
    case 'deletecart':
        (new CartController())->deletecart($_SESSION['userid'], $_GET['bookid']);
        break;
    case 'checkboxincart':
        $bookid = $_POST['bookid'];
        $checkbox = null;
        if(isset($_POST['checkbox'])){
            $checkbox = $_POST['checkbox'];
        }
        (new CartController())->checkboxincart($_SESSION['userid'], $bookid, $checkbox);
        break;
    case 'checkout':
        (new OrderController())->checkout($_SESSION['userid']);
        break;
    case 'doorder':
        (new OrderController())->doorder($_SESSION['userid'], $_POST);
        break;
    case 'ordercancel':
        (new OrderController())->ordercancel($_SESSION['userid'], $_GET['orderid']);
        break;
    case 'requestcancel':
        (new OrderController())->requestcancel($_SESSION['userid'], $_GET['orderid']);
        break;
    case 'complete':
        (new OrderController())->complete($_GET['orderid']);
        break;
    case 'infororder':
        (new OrderController())->infororder($_GET['orderid']);
        break;
    case 'historyorder':
        (new OrderController())->historyorder($_SESSION['userid']);
        break;
    case 'ordercancelview':
        (new OrderController())->ordercancelview($_SESSION['userid']);
        break;
    case 'payonline':
        (new OrderController())->payonline($_GET['amount']);
        break;
    case 'payonlineqr':
        (new OrderController())->payonlineqr($_GET['amount'], $_GET['priceship'], $_GET['totalbook']);
        break;
    case 'payonlineqrreturn':
        (new OrderController())->payonlineqrreturn($_GET['error']);
        break;
    case 'addorderpayonline':
        $_SESSION['inforreturn'] = serialize($_GET);
        $params = unserialize($_SESSION['params']);
        unset($_SESSION['params']);
        (new OrderController())->addorderpayonline($_GET, $params, $_SESSION['userid']);
        break;
    case 'addorderpayonlineqr':
        $params = unserialize($_SESSION['params']);
        unset($_SESSION['params']);
        (new OrderController())->addorderpayonlineqr($params, $_SESSION['userid']);
        break;
    case 'returnpayonline':
        $inforreturn = unserialize($_SESSION['inforreturn']);
        // unset($_SESSION['inforreturn']);
        (new OrderController())->returnpayonline($inforreturn);
        break;
    case 'infororder':
        (new OrderController())->infororder($_GET['orderid']);
        break;
    case 'feedback':
        (new OrderController())->feedback($_GET['orderid']);
        break;
    case 'dofeedback':
        (new OrderController())->dofeedback($_GET['orderid'], $_GET['bookid'], $_SESSION['userid'], $_POST['text'], $_POST['star']);
        break;
    case 'notificationview':
        (new OrderController())->notificationview($_SESSION['userid']);
        break;
    default:
        # code...
        break;
}