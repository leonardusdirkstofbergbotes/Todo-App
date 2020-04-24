<?php 
    $email = $_GET['email'];
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io'; // Set the SMTP server to send through
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = 'e5aa578e3d8566'; // SMTP username
    $mail->Password   = '94d35a635840a3'; // SMTP password
    $mail->SMTPSecure = 'TLS'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 25; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('todoapp@gmail.com.com', 'Admin');
    $mail->addAddress($email, "");  // Add a recipient
    $mail->addReplyTo('info@example.com', 'Information');

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Reset Password!';
    $mail->Body    = "A Reset password has been requested<br>
                     <p>If this is correct please click on the link below to go to the reset password page</p>
                     <br> <a href=\"http://myprojects.com/Todo-App/reset.php\"> Click here</a> <br><br>If this is not correct please ignore this message";
                      
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if ($mail->send() === TRUE) { //If it is successful
        header("Location: ../reset_password.php? request=yes");
        session_destroy();
    }

    // header("Location: method/verified.php"); /* user clicks on the link that users verified column now becomes 1 */

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>