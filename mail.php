<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer autoload
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    // $mail->Username   = 'website-enquiry@truboardpartners.com';
    // $mail->Password   = 'T.727778797228up';  // NOTE: if MFA is enabled, use App Password here
    $mail->Username   = 'website-enquiry@truboardpartners.com';
    $mail->Password   = 'hzhkdwmqskxjhysc';  // NOTE: if MFA is enabled, use App Password here
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    // Pivot@1234
    // pusg qqcl czrj djtl
    // Sender & recipient
    $mail->setFrom('website-enquiry@truboardpartners.com', 'Truboard Website');
    $mail->addAddress('harsh@pivotmkg.com', 'Harsh');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Mail from Website';
    $mail->Body    = 'Hello, Harsh — this is a test email from PHP SMTP!';
    $mail->AltBody = 'Hello, Harsh — this is a test email from PHP SMTP (plain text).';

    $mail->send();
    echo 'Mail sent successfully!';
} catch (Exception $e) {
    echo "Error sending mail: {$mail->ErrorInfo}";
}
?>
