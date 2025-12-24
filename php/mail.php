<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// If installed via Composer:
require 'vendor/autoload.php';

$headers = "From: harsh@pivotmkg.com";
$content = 'Truboard';

$mail = new PHPMailer();
$body = "Hello, Message";
$mail->CharSet = 'UTF-8';
$mail->IsSMTP(); // enable SMTP 
$mail->SMTPAuth = true; // authentication enabled 
$mail->Host = "smtp.office365.com";
$mail->Port = 587; //25; // or 587     
$mail->SMTPSecure = 'tls';
$mail->Username = "website-enquiry@truboardpartners.com";
$mail->Password = "T.727778797228up";
$mail->AddReplyTo("website-enquiry@truboardpartners.com", "Truboard");

//echo $body ;
$mail->SetFrom('website-enquiry@truboardpartners.com', "Administrator");
$address = "harsh@pivotmkg.com";
// $theCc = "emailId";
//$theBcc = "emailId";
$mail->AddAddress($address, "Administrator");
//$mail->AddCC($theCc,"your name");
//$mail->AddBCC($theBcc,"Vinay");
$subject = "Truboard mail subject";
$mail->Subject    = $subject;
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->MsgHTML($body);

if (!$mail->Send()) {
    print "<div class='error'>We encountered an error sending your mail, please notify website-enquiry@truboardpartners.com</div>" . $mail->ErrorInfo;
} else {

    header('location:career.php?sts=done#career-form');
    exit();
}
