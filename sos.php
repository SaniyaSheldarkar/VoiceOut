<?php
session_start();
include 'db_connection.php'; // your DB connection file

$user_id = $_SESSION['user_id'];  // user must be logged in
$emergency_contact = $_GET['number'] ?? '';
$method = $_GET['method'] ?? '';

if ($user_id && $emergency_contact && $method) {
    $stmt = $conn->prepare("INSERT INTO sos_logs (user_id, emergency_contact, method) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $emergency_contact, $method);
    $stmt->execute();
    http_response_code(200);
    echo "Logged";
} else {
    http_response_code(400);
    echo "Missing info";
}
?>
