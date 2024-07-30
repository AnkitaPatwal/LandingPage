<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['demo-name']);
    $email = filter_var($_POST['demo-email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['demo-message']);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    $to = 'ankita04anil@gmail.com'; 


    $subject = 'Contact Form Submission';


    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message\n";


    $headers = "From: $email";


    if (mail($to, $subject, $email_message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request.";
}
?>

