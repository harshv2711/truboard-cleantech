<?php
header('Content-Type: application/json');

// Get form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Validate inputs
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
}

if (empty($message)) {
    $errors[] = 'Message is required';
}

// If there are validation errors, return them
if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => implode(', ', $errors)
    ]);
    exit;
}

// Email configuration
$to = 'harsh@pivotmkg.com'; // Replace with your email
// $to = 'contact@truboardpartners.com'; // Replace with your email
$subject = 'New Contact Form Submission from Truboard';

// Create HTML formatted message
$htmlMessage = "
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
            <p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Message:</strong></p>
            <p>" . nl2br(htmlspecialchars($message)) . "</p>
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
    $mailSent = mail($to, $subject, $htmlMessage, $headers);

    if ($mailSent) {
        echo json_encode([
            'success' => true,
            'message' => 'Thank you for your message. We will get back to you soon.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to send email. Please try again later.'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while sending the email. Please try again later.'
    ]);
}
