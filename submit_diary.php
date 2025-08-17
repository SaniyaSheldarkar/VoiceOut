<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entry = $_POST["entry"];
    $user_id = $_POST["user_id"] ?? null; // Optional

    $stmt = $conn->prepare("INSERT INTO diary_entries (user_id, entry) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $entry);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
