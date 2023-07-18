<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate form data (you can add more validation here if needed)
    if (empty($name) || empty($email) || empty($message)) {
        http_response_code(400); // Bad Request
        echo "All fields are required.";
        exit;
    }

    // Set your email address where you want to receive the form data
    $recipient = "yogit21@iitk.ac.in";

    // Set the email subject
    $subject = "New Contact Form Submission from $name";

    // Prepare the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Message:\n$message\n";

    // Send the email
    if (mail($recipient, $subject, $email_content)) {
        http_response_code(200); // Success
        echo "Thank you! Your message has been sent.";
    } else {
        http_response_code(500); // Internal Server Error
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed.";
}
?>
