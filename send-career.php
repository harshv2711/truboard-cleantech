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
$email      = isset($_POST['email']) ? trim($_POST['email']) : '';
$firstName  = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
$lastName   = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
$jobTitle   = isset($_POST['jobTitle']) ? trim($_POST['jobTitle']) : '';

// Basic validation
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendResponse(400, "Invalid email address.");
}

if (empty($firstName) || empty($lastName)) {
    sendResponse(400, "Please enter your first and last name.");
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
    $mail->addAddress('talenthr.infra@truboardpartners.com', 'Human Resources');
    $mail->addAddress('harshvishwakarma2711@gmail.com', 'Human Resources');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Career Application - Website';
    $mail->Body    = "
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>First Name:</strong> {$firstName}</p>
        <p><strong>Last Name:</strong> {$lastName}</p>
        <p><strong>Job Title:</strong> {$jobTitle}</p>
    ";
    $mail->AltBody = "
        Email: {$email}\n
        First Name: {$firstName}\n
        Last Name: {$lastName}\n
        Job Title: {$jobTitle}
    ";
 
    $mail->send();

    sendResponse(200, "Application sent successfully!");

} catch (Exception $e) {
    sendResponse(500, "Error sending mail: {$mail->ErrorInfo}");
}
?>
