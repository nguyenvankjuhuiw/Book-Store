<?php
require_once 'Facebook/autoload.php';
require 'dao/UserDAO.php';
require 'dao/SendMail.php';

$fb = new Facebook\Facebook([
    'app_id' => '494487603008368', // Replace {app-id} with your app id
    'app_secret' => 'c405d8e805a19e64e3c52ea82f783a8f',
    'default_graph_version' => 'v19.0',
    ]);

$helper = $fb->getRedirectLoginHelper();

if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}

try {
$accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
// When Graph returns an error
echo 'Graph returned an error: ' . $e->getMessage();
exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
// When validation fails or other local issues
echo 'Facebook SDK returned an error: ' . $e->getMessage();
exit;
}

if (! isset($accessToken)) {
if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
} else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
}
exit;
}

try {
    $response = $fb->get('/me?fields=id,name,email', $accessToken->getValue());
} catch(Facebook\Exceptions\FacebookResponseException $e){
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookResponseException $e){
    echo 'Facebook SDK returned an error: ' .$e->getMessage();
    exit;
}
$user = $response->getGraphUser();

session_start();
$fbid = $user->getId();
$fbfullname = $user->getName();
$femail = $user->getEmail();

$info = (new UserDAO())->checkUser($femail);

if(isset($info))
{
    $_SESSION['userid'] = $info->getUserId();
}
else
{
    $params = [];
    $params['fullname'] = $fbfullname;
    $params['username'] = $femail;
    $params['password'] = mt_rand(1000,50000);
    $params['email'] = $femail;
    $params['phone'] = null;

    $address = $params['email'];
    $name = $params['fullname'];
    $title = "Đăng ký tài khoản thành công";
    $passtemporary = password_hash(rand(100000, 999999), PASSWORD_DEFAULT);
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

header('location:/BookStore');
