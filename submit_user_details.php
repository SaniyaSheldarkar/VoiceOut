<?php
include 'db_connection.php'; // Make sure this connects to your MySQL DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $emergency = $_POST['emergency'];
    $education = $_POST['education'];
    $profession = $_POST['profession'];

    $stmt = $conn->prepare("INSERT INTO user_details (fullname, age, address, phone, emergency_contact, education, profession) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssss", $fullname, $age, $address, $phone, $emergency, $education, $profession);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
