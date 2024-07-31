<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if ($name && $email && $message) {
        $to = 'chatrapathivamsikrishna@gmail.com'; // Your email address
        $subject = 'Contact Form Submission from ' . $name;
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $email_body = "<html><body>";
        $email_body .= "<h2>Contact Form Submission</h2>";
        $email_body .= "<p><strong>Name:</strong> $name</p>";
        $email_body .= "<p><strong>Email:</strong> $email</p>";
        $email_body .= "<p><strong>Message:</strong></p>";
        $email_body .= "<p>$message</p>";
        $email_body .= "</body></html>";

        if (mail($to, $subject, $email_body, $headers)) {
            echo "<script>alert('Message sent successfully!');</script>";
        } else {
            echo "<script>alert('Failed to send message.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields correctly.');</script>";
    }
}
?>
