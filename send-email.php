<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set content type to JSON
header('Content-Type: application/json');

// Load Composer autoload
require 'vendor/autoload.php';

// Helper function to send JSON response
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

// Get POST email
$userEmail = isset($_POST['userEmail']) ? trim($_POST['userEmail']) : '';

// Validate email
if (empty($userEmail) || !filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    sendResponse(400, "Invalid email address.");
}

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'website-enquiry@truboardpartners.com';
    $mail->Password   = 'hzhkdwmqskxjhysc'; // Use App Password if MFA is enabled
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Sender & recipient
    $mail->setFrom('website-enquiry@truboardpartners.com', 'Website Enquiry');
    $mail->addAddress('tcpl.marketing@truboardpartners.com', 'TCPL Marketing');
    // $mail->addAddress('harsh@pivotmkg.com', 'TCPL Marketing');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Website Enquiry - Email Capture';
    $mail->Body    = "<p>You have received a new email subscription from: <strong>{$userEmail}</strong></p>";
    $mail->AltBody = "You have received a new email subscription from: {$userEmail}";

    $mail->send();

    sendResponse(200, "Mail sent successfully!");

} catch (Exception $e) {
    sendResponse(500, "Error sending mail: {$mail->ErrorInfo}");
}
?>
