<!-- Validation  -->
<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require "vendor/autoload.php";

$emailRegex = "/^[\w-]+(\.[\w-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
$mailUser = "";
//set here your mail password
$mailPassword = "XXXXX";
//clean if set collected data from user post Request
if (isset($_POST['firstName'])) {
    $name = htmlentities(trim($_POST['firstName']), ENT_QUOTES, 'UTF-8');

    if (isset($_POST['lastName'])) {
        $name = htmlentities(trim($_POST['lastName']), ENT_QUOTES, 'UTF-8');

        if (isset($_POST['email'])) {
            $email = htmlentities(trim($_POST['email']), ENT_QUOTES, 'UTF-8');

            if (isset($_POST['phoneNumber'])) {
                $phone = htmlentities(trim($_POST['phoneNumber']), ENT_QUOTES, 'UTF-8');

                if (isset($_POST['message'])) {
                    $message = htmlentities(trim($_POST['message']), ENT_QUOTES, 'UTF-8');

                }
            }
        }
    }
}

$form_valid = true;
// //check if all the data from user  is correct
if (!$name || mb_strlen($name) < 2 || mb_strlen($name) > 70) {

    $error = '* Name is required for min 2 chars and max 70';
    $form_valid = false;

} else if (!ctype_alpha($name)) {
    $error = '* Name is required with only letters';
    $form_valid = false;
}

if (!empty($email) && !preg_match($emailRegex, $email)) {
    $error = '* A valid email is required';
    $form_valid = false;
}

if ($form_valid == true) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = $mailUser; //SMTP username
        $mail->Password = $mailPassword; //SMTP password
        $mail->SMTPSecure = 'tls'; //Enable TLS encryption;
        $mail->Port = 587; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($mailUser, 'theRobot');
        $mail->addAddress($mailUser); //Add a recipient

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'work';
        $mail->Body = "This is the parameters:name=$name<br>email=$email<br>phone=$phone<br>,message=$message<br>,$quaryParam";
        $mail->send();
        $mail->ClearAllRecipients();
        echo 'Message has been sent';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    if ($error) {
        echo $error;
    }
    ;
}

?>