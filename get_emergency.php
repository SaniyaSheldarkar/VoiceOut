<?php
header('Content-Type: application/json');
include 'db_connection.php';

// Adjust the query to your actual table and column names
$sql = "SELECT emergency_contact FROM user_details ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    echo json_encode(["number" => $row['emergency_contact']]);
} else {
    echo json_encode(["number" => null]);
}

$conn->close();
?>
