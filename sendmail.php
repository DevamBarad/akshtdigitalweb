<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data safely
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Your email where you want to receive messages
    $to = "baraddevam@gmail.com"; 
    $subject = "New Contact Form Message from $name";

    // Email content
    $body = "
    <h2>New Message from Website Contact Form</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Message:</strong><br>$message</p>
    ";

    // Email headers
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $name <$email>" . "\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
            alert('✅ Your message has been sent successfully!');
            window.location.href='index.html'; // change to your home/contact page
        </script>";
    } else {
        echo "<script>
            alert('❌ Sorry, your message could not be sent. Please try again later.');
            window.history.back();
        </script>";
    }
}
?>
