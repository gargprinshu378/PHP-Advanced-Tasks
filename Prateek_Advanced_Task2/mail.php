<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

try {

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication  
    $mail->Username = 'your@example.com';
    $mail->Password = 'password';                             //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('your@example.com');
    $mail->addAddress($_POST['email']);               //Name is optional
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Form Submission';
    $mail->Body    = '<b>Thank you for your submission</b>';
    $mail->send();
    echo '<br><b>Message has been sent</b>';
} catch (Exception $e) {
    echo '<br> <br>';
    if(isset($_POST["submit"]))
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>










