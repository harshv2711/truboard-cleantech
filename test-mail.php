<?php
$name = "harsh";
$phone = "8552039349";
$email = "harsh@pivotmkg.com";

// Email details
$to = "harsh@pivotmkg.com"; // Multiple recipients
$subject = "New Form Submission";
$message = "Name: $name\nPhone: $phone\nPhone: $email";
$headers = "From: harsh@pivotmkg.com\r\n"; // Replace with your domain

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo json_encode(['status' => 'success', 'message' => 'Thank you. You will receive a callback from our sales representative soon!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to send email. Please try again.']);
}
