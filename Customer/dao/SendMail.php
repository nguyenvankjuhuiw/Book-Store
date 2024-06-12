<?php

require 'PHPMailer/src/DSNConfigurator.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/OAuthTokenProvider.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/POP3.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendMail {

    public function sendMailByAddress($address, $name, $title, $content)
    {
        $mail = new PHPMailer(false);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'webrapchieuphim@gmail.com';                     //SMTP username
            $mail->Password   = 'oywo uaeh idse ywwc';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->SMTPSecure = "tls";                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet    = "UTF-8";

            //Recipients
            $mail->setFrom('cuahangsach021@gmail.com', 'Sach021');
            $mail->addAddress($address, $name);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $content;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    
}

