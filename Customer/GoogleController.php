<?php

ob_start();
session_start();

require 'google-api/vendor/autoload.php';
require 'model/ClientGoogle.php';
require 'dao/UserDAO.php';
require 'dao/SendMail.php';

$client = ClientGoogle();
$service = new Google_Service_Oauth2($client);

if(isset($_GET['code'])){
    $check = $client->authenticate($_GET['code']);
    if(empty( $check['error'] )){
        $user = $service->userinfo->get();
        $info = (new UserDAO())->checkUser($user->email);
        if(isset($info))
        {
            $_SESSION['userid'] = $info->getUserId();
        }
        else
        {
            $params = [];
            $params['fullname'] = $user->name;
            $params['username'] = $user->email;
            $params['password'] = password_hash(rand(100000, 999999), PASSWORD_DEFAULT);
            $params['email'] = $user->email;
            $params['phone'] = null;

            $address = $params['email'];
            $name = $params['fullname'];
            $title = "Đăng ký tài khoản thành công";
            $passtemporary = rand(100000, 999999);
            $content = "
                <h2>Thông tin tài khoản của bạn</h2>
                <table>
                    <tr>
                        <th>Họ và tên: </th>
                        <td>" . $params['fullname'] . "</td>
                    </tr>
                    <tr>
                        <th>Tên đăng nhập: </th>
                        <td>" . $params['username'] . "</td>
                    </tr>
                </table>
            ";
            (new SendMail())->sendMailByAddress($address, $name, $title, $content);
        
            $ok = (new UserDAO())->insertUser($params);
            if($ok){
                $info = (new UserDAO())->checkUser($user->email);
                $_SESSION['userid'] = $info->getUserId();
            }
        }
    }  
}

header('location:/BookStore');