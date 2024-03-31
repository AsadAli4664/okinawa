<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'asadali4664@gmail.com';
        $mail->Password   = 'lslygotjlupfobbn';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('asadali4664@gmail.com', 'Mailer');
        $mail->addAddress('asadali4664@gmail.com', 'Hamari web');

        $mail->isHTML(true);
        $mail->Subject = "Sender Subject - $subject";
        $mail->Body    = "Sender Name - $name <br> Sender Email - $email <br> Sender Message - $message";

        $mail->send();

        // Trigger SweetAlert for success
        // Trigger SweetAlert for success
        echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Your message has been sent!',
                  showConfirmButton: false,
                  timer: 3000 // 3 seconds
                }).then(() => {
                    $('#loader').hide(); // Hide loader after showing success message
                });
              </script>";
    } catch (Exception $e) {
        // Trigger SweetAlert for error
        echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong! Message could not be sent.',
                }).then(() => {
                    $('#loader').hide(); // Hide loader after showing error message
                });
              </script>";
    }
}
?>