<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to PHPMailer autoload file

function sendEmail($recipientEmail, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
        // Konfigurasi SMTP server
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Ganti dengan host SMTP Anda
        $mail->SMTPAuth = true;
        $mail->Username = 'ppksstis@gmail.com'; // Ganti dengan alamat email Anda
        $mail->Password = 'ajegile2024'; // Ganti dengan password email Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Penerima dan pengirim
        $mail->setFrom('ppksstis@gmail.com', 'Satgas PPKS Politeknik Statistika STIS'); // Ganti dengan email dan nama Anda
        $mail->addAddress($recipientEmail);

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
