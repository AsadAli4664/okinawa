<?php

require 'vendor/autoload.php'; // Assuming PHPMailer is installed via Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Replace with your details
  $from = "asadali4664@gmail.com";

  // SendGrid API key
  $apiKey = 'YOUR_SENDGRID_API_KEY';

  $mail = new PHPMailer\PHPMailer\PHPMailer(true);

  try {
    // SMTP configuration (replace with SendGrid details)
    $mail->isSMTP();
    $mail->Host = 'smtp.sendgrid.net';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'apikey'; // SendGrid username
    $mail->Password = $apiKey; // SendGrid API key
    $mail->SMTPSecure = 'tls';

    // Email content
    $mail->setFrom($from);
    $mail->addAddress($from); // Set recipient to your email for testing
    $mail->Subject = $subject;
    $mail->isHTML(true);  // Enable HTML email
    $mail->Body = "<b>Name:</b> $name<br><b>Email:</b> $email<br><b>Subject:</b> $subject<br><b>Message:</b> $message";

    // Send the email
    if ($mail->send()) {
      echo "Your message has been sent successfully!";
    } else {
      echo "Error sending email: " . $mail->ErrorInfo;
    }
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
}

?>
