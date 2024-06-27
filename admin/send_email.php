<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

$data = json_decode(file_get_contents('php://input'), true);
$caseId = $data['id'];
$newStatus = $data['status'];

$stmt = $pdo->prepare("SELECT email, nama_lengkap FROM reports WHERE id = ?");
$stmt->execute([$caseId]);
$report = $stmt->fetch(PDO::FETCH_ASSOC);

if ($report) {
    $recipientEmail = $report['email'];
    $subject = "Update Status Kasus";
    $body = "Halo " . htmlspecialchars($report['nama_lengkap']) . ",<br><br>Status kasus Anda telah diperbarui menjadi: " . htmlspecialchars($newStatus) . "<br><br>Terima kasih.";

    if (sendEmail($recipientEmail, $subject, $body)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal mengirim email.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Kasus tidak ditemukan.']);
}

function sendEmail($recipientEmail, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
        
        //? kofigurasi
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ppksstis@gmail.com';
        $mail->Password = 'ajegile2024';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //! Penerima dan pengirim
        $mail->setFrom('ppksstis@gmail.com', 'Satgas PPKS Polstat STIS');
        $mail->addAddress($recipientEmail);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

