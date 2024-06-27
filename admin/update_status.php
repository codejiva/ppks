<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = isset($data['id']) ? $data['id'] : '';
$new_status = isset($data['status']) ? $data['status'] : '';

$statusMap = [
    1 => 'Process',
    2 => 'Checking',
    3 => 'Discussion',
    4 => 'Finish'
];

if ($id && $new_status) {
    $stmt = $pdo->prepare("UPDATE reports SET status = :status WHERE id = :id");
    $stmt->bindParam(':status', $new_status, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        // Fetch the email of the reporter
        $stmt = $pdo->prepare("SELECT email FROM reports WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $report = $stmt->fetch(PDO::FETCH_ASSOC);
        $email = $report['email'];

        // Send email notification
        $subject = "Update Status Kasus";
        $message = "Status kasus Anda telah berubah menjadi " . $statusMap[$new_status];
        $headers = "From: no-reply@ppks.com";

        // Using PHP's mail function for simplicity, adjust this to your mail server configuration
        if (mail($email, $subject, $message, $headers)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Email sending failed']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Database update failed']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
?>
