<!-- contact_test.php -->
<?php
// If form posted, process input
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Basic sanitization
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $msg = trim($_POST['message'] ?? '');

    // Very simple validation
    if ($name === '' || $email === '' || $msg === '') {
        $message = "Please fill all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email.";
    } else {
        // Normally you'd store or email this — for test we'll just show confirmation
        $message = "Thanks, " . htmlspecialchars($name) . "! We received your message at " . date("H:i:s") . ".";
        // Example: $saved = file_put_contents('messages.txt', "$name | $email | $msg\n", FILE_APPEND);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Contact Test</title>
</head>
<body>
  <h1>Contact Form Test</h1>

  <?php if ($message): ?>
    <p><strong><?php echo htmlspecialchars($message); ?></strong></p>
  <?php endif; ?>

  <form method="post" action="">
    <label>
      Name:<br>
      <input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
    </label>
    <br><br>
    <label>
      Email:<br>
      <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
    </label>
    <br><br>
    <label>
      Message:<br>
      <textarea name="message" rows="5" cols="30"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
    </label>
    <br><br>
    <button type="submit">Send</button>
  </form>
</body>
</html>
