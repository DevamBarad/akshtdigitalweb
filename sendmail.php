<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('Please fill in all fields.'); window.history.back();</script>";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address.'); window.history.back();</script>";
        exit;
    }

    // Your recipient email
    $to = "useforworkon@gmail.com";  // <-- change to your email address
    $subject = "New Contact Message from $name";

    // Message content
    $body = "
    <html>
    <head><title>Contact Message</title></head>
    <body>
    <h3>New Message from Contact Form</h3>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Message:</strong><br>{$message}</p>
    </body>
    </html>
    ";

    // Headers for HTML email
    $headers = "From: {$name} <{$email}>\r\n";
    $headers .= "Reply-To: {$email}\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('✅ Your message has been sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('❌ Message could not be sent. Please try again later.'); window.history.back();</script>";
    }

} else {
    echo "<script>alert('Invalid request'); window.history.back();</script>";
}
?>
