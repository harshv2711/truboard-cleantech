<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

// Load Composer autoload
require __DIR__ . '/vendor/autoload.php';

// Allow only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
    exit;
}

// Get form inputs
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation
$errors = [];

if ($name === '') {
    $errors[] = 'Name is required';
}

if ($email === '') {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
}

if ($message === '') {
    $errors[] = 'Message is required';
}

if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => implode(', ', $errors)
    ]);
    exit;
}

$mail = new PHPMailer(true);

try {
    // SMTP SETTINGS (Office365)
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'website-enquiry@truboardpartners.com';
    $mail->Password   = 'hzhkdwmqskxjhysc'; // MUST be App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Azure compatibility
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
        'Truboard Website'
    );

    // RECEIVER EMAIL (change if needed)
    $mail->addAddress('harshvishwakarma2711@gmail.com');
    $mail->addAddress('harsh@pivotmkg.com');
    $mail->addAddress('aakash@pivotmkg.com');
    $mail->addAddress('tcpl.marketing@truboardpartners.com', 'TCPL Marketing');


    // Reply goes to user
    $mail->addReplyTo($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission - Truboard';

    $mail->Body = "
        <h3>New Contact Form Submission</h3>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong></p>
        <p>" . nl2br(htmlspecialchars($message)) . "</p>
        <p><strong>Submitted at:</strong> " . date('Y-m-d H:i:s') . "</p>
    ";

    $mail->AltBody = "
Name: {$name}
Email: {$email}
Message: {$message}
Submitted at: " . date('Y-m-d H:i:s');

    // SEND
    $mail->send();

    echo json_encode([
        'success' => true,
        'message' => 'Thank you for your message. We will get back to you soon.'
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Mailer Error: ' . $mail->ErrorInfo
    ]);
}
