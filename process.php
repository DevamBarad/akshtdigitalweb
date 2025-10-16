<?php
// process.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get and sanitize form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Simple validation
    if (empty($name) || empty($email) || empty($message)) {
        echo "<h3 style='color:red;'>Please fill all fields.</h3>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h3 style='color:red;'>Invalid email format.</h3>";
        exit;
    }

    // Display the received data (for testing)
    echo "<h2>Form Submitted Successfully ✅</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Message:</strong> $message</p>";

    // Example of storing or emailing (disabled for now)
    // mail("your_email@example.com", "New message from $name", $message, "From: $email");
} else {
    echo "<h3 style='color:red;'>Invalid Request</h3>";
}
?>
