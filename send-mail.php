<?php
// Enable error reporting for debugging (optional, remove in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Define recipient email address
$to = "rolan@landogzwebsolutions.com"; // Replace with your email address

// Retrieve form data
$name = htmlspecialchars(trim($_POST['UserName']));
$email = htmlspecialchars(trim($_POST['UserEmail']));
$subject = htmlspecialchars(trim($_POST['subject']));
$message = htmlspecialchars(trim($_POST['message']));

// Validate inputs
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
    exit;
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["status" => "error", "message" => "Invalid email address."]);
    exit;
}

// Compose the email
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$fullMessage = "Name: $name\n";
$fullMessage .= "Email: $email\n";
$fullMessage .= "Message:\n$message";

// Send the email
if (mail($to, $subject, $fullMessage, $headers)) {
    echo json_encode(["status" => "success", "message" => "Your message has been sent successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to send the message. Please try again later."]);
}
?>
