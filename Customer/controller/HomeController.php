<?php

class HomeController {

    public function home()
    {
        require 'dao/UserDAO.php';     
        $listallbook = (new BookDAO())->getAllBookLimit8();
        $listbook_it = (new BookDAO())->getBookByCateidLimit8(9);
        $listbook_literature = (new BookDAO())->getBookByCateidLimit8(1);
        $listbook_economy = (new BookDAO())->getBookByCateidLimit8(2);
        $listbook_children = (new BookDAO())->getBookByCateidLimit8(3);
        $listbook_bestseller = (new BookDAO())->getSellingBooksLimit6();
        $totalquantity = (new BookDAO())->getTotalQuantity();
        $totalcustomer = (new UserDAO())->getCountAllUser();
        require 'view/templates/HomeFrm.php';
    }

    public function book($page, $cateid, $genreid, $sellingbook, $key, $pricestart, $priceend, $selectid)
    {
        require 'dao/BookDAO.php';
        $numberbook = 9;
        $listbook = null;
        $countlistbook = 0;
        $info_filter = "";
        if(isset($sellingbook)){
            $info_filter = "Các sách bán chạy";
            $listbook = (new BookDAO())->getSellingBooksByPage($page, $numberbook);
            $countlistbook = (new BookDAO())->getCountSellingBooks();
        }
        else if(isset($cateid) or isset($genreid) or isset($key)){
            if(isset($cateid)){
                $info_filter = (new CategoryDAO())->getCategoryById($cateid)->getCatename();
            }
            if(isset($genreid)){
                $info_filter = (new GenreDAO())->getGenreById($genreid)->getGenrename();
            }
            if(isset($key)){
                $info_filter = "Tìm kiếm theo từ khóa '$key'";
            }
            $listbook = (new BookDAO())->getBookByIdAndKeyAndPage($cateid, $genreid, $key, $page, $numberbook);
            $countlistbook = (new BookDAO())->getCountBookByIdAndKey($cateid, $genreid, $key);
        }
        else if (isset($pricestart)){

            $info_filter = "Các sách có giá từ " . number_format($pricestart) . "đ đến " . number_format($priceend) . "đ";
            $listbook = (new BookDAO())->getBookByPriceAndPage($page, $numberbook, $pricestart, $priceend);
            $countlistbook = (new BookDAO())->getCountBookByPrice($pricestart, $priceend);
        }
        else if(isset($selectid)){
            if($selectid == 0){
                $listbook = (new BookDAO())->getBookByPage($page, $numberbook);
                $countlistbook = (new BookDAO())->getCountAllBook();
            }
            else if($selectid == 1){
                $listbook = (new BookDAO())->getSellingBooksByPage($page, $numberbook);
                $countlistbook = (new BookDAO())->getCountSellingBooks();
            }
            else if($selectid == 2){
                $listbook = (new BookDAO())->getBookByArrange($page, $numberbook, true);
                $countlistbook = (new BookDAO())->getCountBookByArrange(true);
            }
            else if($selectid == 3){
                $listbook = (new BookDAO())->getBookByArrange($page, $numberbook, false);
                $countlistbook = (new BookDAO())->getCountBookByArrange(false);
            }   
        }
        else {
            $listbook = (new BookDAO())->getBookByPage($page, $numberbook);
            $countlistbook = (new BookDAO())->getCountAllBook();
        }
        $numberpage = ceil($countlistbook / $numberbook);
        $listsellingbooks = (new BookDAO())->getSellingBooksLimit3();
        require 'view/templates/BookFrm.php';
    }

    public function bookdetail($bookid)
    {
        require 'dao/BookDAO.php';
        $book_detail = (new BookDAO())->getBookById($bookid);
        $listsellingbooks = (new BookDAO())->getSellingBooksLimit3();
        require 'view/templates/BookDetailFrm.php';
    }

    public function login($error=null)
    {
        if($error == 1){
            $error = "Người dùng không tồn tại";
        }
        require 'model/ClientGoogle.php';
        $client = ClientGoogle();
        $url = $client->createAuthUrl();

        require 'Facebook/autoload.php';

        $fb = new Facebook\Facebook([
        'app_id' => '494487603008368', // Replace {app-id} with your app id
        'app_secret' => 'c405d8e805a19e64e3c52ea82f783a8f',
        'default_graph_version' => 'v19.0',
        ]);
        
        $helper = $fb->getRedirectLoginHelper();
        
        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('http://localhost/BookStore/FacebookController.php', $permissions);
        
        require 'view/templates/LoginFrm.php';
    }

    public function dologin($username, $password)
    {
        require 'dao/UserDAO.php';
        $user = (new UserDAO())->checkUser($username);
        if($user == null){
            header('location:?route=login&error=1');
            exit();
        }
        $password_encode = $user->getPassword();
        if(!password_verify($password, $password_encode)){
            header('location:?route=login&error=1');
            exit();
        }
        session_start();
        $_SESSION['userid'] = $user->getUserId();
        header('location:?route=home');
    }

    public function register($error)
    {
        if($error == 1){
            $error = "Tên đăng nhập tồn tại";
        }
        if($error == 2){
            $error = "Email không tồn tại";
        }
        require 'model/ClientGoogle.php';
        $client = ClientGoogle();
        $url = $client->createAuthUrl();
        require 'view/templates/RegisterFrm.php';
    }

    public function doregister($params)
    {
        require 'dao/UserDAO.php';
        $user = (new UserDAO())->checkUser($params['username']);
        if(isset($user)){
            header('location:?route=register&error=1');
            exit();
        }
        $params['password'] = password_hash($params['password'], PASSWORD_DEFAULT);
        require 'dao/SendMail.php';
        $address = $params['email'];
        $name = $params['fullname'];
        $title = "Đăng ký tài khoản thành công";
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
                <tr>
                    <th>Số điện thoại :</th>
                    <td>" . $params['phone'] . "</td>
                </tr>
            </table>
        ";
        $check = (new SendMail())->sendMailByAddress($address, $name, $title, $content);
        if($check == false){
            header('location:?route=register&error=2');
            exit();
        }
        (new UserDAO())->insertUser($params);
        $user = (new UserDAO())->checkUser($params['username']);
        session_start();
        $_SESSION['userid'] = $user->getUserId();
        header('location:?route=home');
    }

    public function profile()
    {
        require 'view/templates/ProfileFrm.php';
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['userid']);
        header('location:?route=home');
    }

    public function updateprofile()
    {
        require 'view/templates/UpdateProfileFrm.php';
    }

    public function doupdateprofile($params, $userid)
    {
        require 'dao/UserDAO.php';
        (new UserDAO())->updateUser($params, $userid);
        header('location:?route=profile');
    }

    public function changepassword($error, $success)
    {
        if($error == 1){
            $error = "Mật khẩu cũ không đúng!";
        }
        if($error == 2){
            $error = "Lỗi khi thay đổi mật khẩu";
        }
        if(isset($success)){
            $success = "Thay đổi mật khẩu thành công";
        }
        require 'view/templates/ChangePasswordFrm.php';
    }

    public function dochangepassword($userid, $password1, $password2)
    {
        require 'dao/UserDAO.php';
        $user = (new UserDAO())->getUserById($userid);
        if(!password_verify($password1, $user->getPassword())){
            header('location:?route=changepassword&error=1');
            exit();
        }
        $password_encode = password_hash($password2, PASSWORD_DEFAULT);
        $check = (new UserDAO())->updatePassword($userid, $password_encode);
        if($check == null){
            header('location:?route=changepassword&success=1');
            exit();
        }
        header('location:?route=changepassword&error=2');
    }

    public function forgetpassword($error)
    {
        if($error == 1){
            $error = "Không tìm thấy người dùng";
        }
        else if($error == 2){
            $error = "Lỗi khi mật khẩu qua mail";
        }
        require 'view/templates/SearchUserFrm.php';
    }

    public function doforgetpassword($username)
    {
        require 'dao/UserDAO.php';
        $user = (new UserDAO())->checkUser($username);
        if($user == null){
            header('location:?route=forgetpassword&error=1');
            exit();
        }
        require 'dao/SendMail.php';
        $address = $user->getEmail();
        $name = $user->getFullName();
        $title = "Quên mật khẩu";
        $passtemporary = rand(100000, 999999);
        $content = "
            <h2>Mật khẩu tạm thời của bạn tại Sach021</h2>
            <table>
                <tr>
                    <th>Tên đăng nhập: </th>
                    <td>" . $user->getUserName() . "</td>
                </tr>
                <tr>
                    <th>Mật khẩu tạm thời:</th>
                    <td>" . $passtemporary . "</td>
                </tr>
            </table>
        ";
        $check = (new SendMail())->sendMailByAddress($address, $name, $title, $content);
        if($check == false){
            header('location:?route=forgetpassword&error=2');
            exit();
        }
        else {
            session_start();
            $_SESSION['passtemporary'] = $passtemporary;
            header('location:?route=passtemporary&username=' . $username);
        }
        
    }

    public function passtemporary($username, $error)
    {
        if($error == 1){
            $error = "Mật khẩu không đúng";
        }
        require 'view/templates/PassTemporaryFrm.php';
    }

    public function dopasstemporary($username, $password, $passtemporary)
    {
        require 'dao/UserDAO.php';
        if($password != $passtemporary){
            header('location:?route=password&username=' . $username . '&error=1');
            exit();
        }
        header('location:?route=passnew&username=' . $username);
    }

    public function passnew($username)
    {
        require 'view/templates/PassNewFrm.php';
    }

    public function dopassnew($username, $password)
    {
        require 'dao/UserDAO.php';
        $user = (new UserDAO())->checkUser($username);
        if($user == null or $user->getUserName() != $username){
            header('location:?route=forgetpassword&error=1');
            exit();
        }
        $password_encode = password_hash($password, PASSWORD_DEFAULT);
        (new UserDAO())->updatePassword($user->getUserId(), $password_encode);
        $user = (new UserDAO())->checkUser($username);
        session_start();
        $_SESSION['userid'] = $user->getUserId();
        header('location:?route=home');
    }

    public function contact($error)
    {
        if($error == 1){
            $error = "Email của bạn không tồn tại";
        }
        require 'view/templates/ContactFrm.php';
    }

    public function docontact($name, $email, $mess)
    {
        require 'dao/SendMail.php';
        $address = $email;
        $name = $name;
        $title = "Gửi câu hỏi thành công";
        $content = "Chúng tôi đã nhận được câu hỏi của bạn, câu hỏi của bạn sẽ được trả lời trong vài ngày tới.";
        $check = (new SendMail())->sendMailByAddress($address, $name, $title, $content);
        if($check == false){
            header('location:?route=contact&error=1');
            exit();
        }
        $addressshop = "cuahangsach021@gmail.com";
        $nameshop = "Sach021";
        $titleshop = "Câu hỏi của khách hàng";
        $contentshop = "
            <table>
                <tr>
                    <th>Tên người gửi: </th>
                    <td>" . $name . "</td>
                </tr>
                <tr>
                    <th>Email nhận phản hồi:</th>
                    <td>" . $email . "</td>
                </tr>
                <tr>
                    <th>Câu hỏi:</th>
                    <td>" . $mess . "</td>
                </tr>
            </table>
        ";
        $check = (new SendMail())->sendMailByAddress($addressshop, $nameshop, $titleshop, $contentshop);
        header('location:?route=home');
    }

    public function errorpage()
    {
        require 'view/templates/Error404Frm.php';
    }
}