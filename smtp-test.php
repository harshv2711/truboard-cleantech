<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';

    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'website-enquiry@truboardpartners.com';
    $mail->Password   = 'hzhkdwmqskxjhysc'; // Use App Password if needed
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true,
        ],
    ];

    // FROM must match Gmail account
    $mail->setFrom(
        'website-enquiry@truboardpartners.com',
        'SMTP Test'
    );

    $mail->addAddress('website-enquiry@truboardpartners.com');
    $mail->addAddress('harshvishwakarma2711@gmail.com');
    $mail->addAddress('harsh@pivotmkg.com');    

    $mail->isHTML(true);
    $mail->Subject = 'office365 SMTP Test Email';
    $mail->Body    = '<h3>office365 SMTP Test Successful</h3>';
    $mail->AltBody = 'office365 SMTP Test Successful';

    $mail->send();

    echo '<h2 style="color:green;">SMTP TEST SUCCESSFUL ✅</h2>';

} catch (Exception $e) {
    echo '<h2 style="color:red;">SMTP TEST FAILED ❌</h2>';
    echo '<pre>' . htmlspecialchars($mail->ErrorInfo) . '</pre>';
}
