<?php
header('Content-Type: application/json');

// Get the email from POST data
$email = $_POST['email'] ?? '';
$to = $_POST['to'] ?? 'aakash@pivotmkg.com';

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email format']);
    exit;
}

// Email subject and message
$subject = 'New Contact Form Submission from Truboard';

// Create HTML formatted message
$message = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        .content { background-color: #ffffff; padding: 20px; border-radius: 5px; border: 1px solid #dee2e6; }
        .footer { margin-top: 20px; font-size: 12px; color: #6c757d; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>New Contact Form Submission</h2>
        </div>
        <div class='content'>
            <p><strong>From:</strong> $email</p>
            <p><strong>Time:</strong> " . date('Y-m-d H:i:s') . "</p>
        </div>
        <div class='footer'>
            <p>This email was sent from the Truboard contact form.</p>
        </div>
    </div>
</body>
</html>";

// Email headers
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Try to send the email
try {
    $mailSent = mail($to, $subject, $message, $headers);

    if ($mailSent) {
        echo json_encode(['success' => true, 'message' => 'Email sent successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to send email']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error sending email: ' . $e->getMessage()]);
}
