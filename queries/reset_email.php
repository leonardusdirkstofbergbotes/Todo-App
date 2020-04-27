<?php 
    $email = $_GET['email'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP(); 
    $mail->Host       = 'smtp.mailtrap.io';
    $mail->SMTPAuth   = true; 
    $mail->Username   = 'e5aa578e3d8566';
    $mail->Password   = '94d35a635840a3';
    $mail->SMTPSecure = 'TLS';
    $mail->Port       = 25; 

    //Recipients
    $mail->setFrom('todoapp@gmail.com.com', 'Admin');
    $mail->addAddress($email, "");
    $mail->addReplyTo('info@example.com', 'Information');

    // Content
    $mail->isHTML(true); 
    $mail->Subject = 'Reset Password!';
    $mail->Body    = "A Reset password has been requested<br>
                     <p>If this is correct please click on the link below to go to the reset password page</p>
                     <br> <a href=\"http://myprojects.com/Todo-App/reset.php? email=$email\"> Click here</a> <br><br>If this is not correct please ignore this message";
                      
    $mail->AltBody = "A Reset password has been requested
                    If this is correct please click on the link below to go to the reset password page
                    http://myprojects.com/Todo-App/reset.php? email=$email Click here  If this is not correct please ignore this message";

    if ($mail->send() === TRUE) { //If it is successful
        header("Location: ../reset_password.php? request=yes");
        session_destroy();
    }

    // header("Location: method/verified.php"); /* user clicks on the link that users verified column now becomes 1 */

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>