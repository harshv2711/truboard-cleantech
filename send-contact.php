<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set content type to JSON
header('Content-Type: application/json');

// Load Composer autoload
require 'vendor/autoload.php';

// Helper function
function sendResponse($statusCode, $message) {
    http_response_code($statusCode);
    echo json_encode([
        'status' => $statusCode,
        'message' => $message
    ]);
    exit;
}

// Only allow POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    sendResponse(405, "Invalid request method. Only POST allowed.");
}

// Get POST fields
$firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
$email     = isset($_POST['email']) ? trim($_POST['email']) : '';
$message   = isset($_POST['Message']) ? trim($_POST['Message']) : '';

// Basic validation
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendResponse(400, "Invalid email address.");
}

if (empty($firstName)) {
    sendResponse(400, "Please enter your name.");
}

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'website-enquiry@truboardpartners.com';
    $mail->Password   = 'hzhkdwmqskxjhysc'; // Use App Password if needed
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Sender & recipient
    $mail->setFrom('website-enquiry@truboardpartners.com', 'Website Enquiry');
    $mail->addAddress('tcpl.marketing@truboardpartners.com', 'TCPL Marketing');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Website Enquiry';
    $mail->Body    = "
        <p><strong>Name:</strong> {$firstName}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong> {$message}</p>
    ";
    $mail->AltBody = "
        Name: {$firstName}\n
        Email: {$email}\n
        Message: {$message}
    ";

    $mail->send();

    sendResponse(200, "Enquiry sent successfully!");

} catch (Exception $e) {
    sendResponse(500, "Error sending mail: {$mail->ErrorInfo}");
}
?>
