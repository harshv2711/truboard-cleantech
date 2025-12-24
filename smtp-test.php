<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Show all errors for testing
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load Composer autoload
require __DIR__ . '/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Enable SMTP debug output (VERY IMPORTANT for testing)
    $mail->SMTPDebug = 2; // 0 = off, 2 = full debug
    $mail->Debugoutput = 'html';

    // SMTP SETTINGS (Office365)
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'website-enquiry@truboardpartners.com';
    $mail->Password   = 'hzhkdwmqskxjhysc'; // App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Azure TLS compatibility
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true,
        ],
    ];

    // Email headers
    $mail->setFrom(
        'website-enquiry@truboardpartners.com',
        'SMTP Test'
    );

    // Send test email to yourself
    $mail->addAddress('harshvishwakarma2711@gmail.com');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'SMTP Test Email';
    $mail->Body    = '<h3>SMTP Test Successful</h3><p>If you received this, SMTP works.</p>';
    $mail->AltBody = 'SMTP Test Successful';

    // Send
    $mail->send();

    echo '<h2 style="color:green;">SMTP TEST SUCCESSFUL ✅</h2>';

} catch (Exception $e) {
    echo '<h2 style="color:red;">SMTP TEST FAILED ❌</h2>';
    echo '<pre>' . htmlspecialchars($mail->ErrorInfo) . '</pre>';
}
