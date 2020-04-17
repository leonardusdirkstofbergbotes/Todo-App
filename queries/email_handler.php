<?php 
    session_start();
    $id = $_SESSION['id'];
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
    $mail->addAddress($_SESSION['email'], $_SESSION['name']);  // Add a recipient
    $mail->addReplyTo('info@example.com', 'Information');

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Todo APP Signup Confirmation';
    $mail->Body    = "Thank you ".$_SESSION['name']." for signing up<br>
                     <p>You are succsesfully registered. Please click on the link below to confirm your registration</p>
                     <br> <a href=\"http://testing.com/mysql test/methods/verified.php? id=$id\"> Click here</a> <br><br> Once you click on this link you will be redirected to the login page";
                      
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if ($mail->send() === TRUE) { //If it is successful
        header("Location: ../login.php? success= yes");
        session_destroy();
    }

    // header("Location: method/verified.php"); /* user clicks on the link that users verified column now becomes 1 */

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>