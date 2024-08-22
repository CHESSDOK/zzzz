<?php
include 'conn_db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'mailer/vendor/autoload.php';

function sendVerificationEmail($email, $token) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'marklawrencemercado8@gmail.com'; // SMTP username
        $mail->Password = 'svvj rfpf egbx qbvo'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('marklawrencemercado8@gmail.com', 'PESO-lb.ph');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = 'Click on the link to verify your email: <a href="http://localhost/peso/php/verify.php?token=' . $token . '">Verify Email</a>';

        $mail->send();
        echo 'Verification email has been sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $user_type = $conn->real_escape_string($_POST['user_type']);
    $token = bin2hex(random_bytes(50));

    $sql = "INSERT INTO register (Fname, Lname, email, password, usertype, token, is_verified) VALUES ('$firstname', '$lastname', '$email', '$password', '$user_type', '$token', 0)";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;

        if ($user_type == 'Employer') {
            $sql = "INSERT INTO learners_profile (user_id) VALUES ('$last_id')";
        } elseif ($user_type == 'Applicant') {
            $sql = "INSERT INTO applicant_profile (user_id) VALUES ('$last_id')";
        } elseif ($user_type == 'ofw') {
            $sql = "INSERT INTO ofw_profile (user_id) VALUES ('$last_id')";
        }

        if ($conn->query($sql) === TRUE) {
            sendVerificationEmail($email, $token);
            echo "Registration successful! Please verify your email.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
