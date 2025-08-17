<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? null;
    $email = $_POST["email"] ?? null;
    $category = $_POST["category"];
    $details = $_POST["details"];
    $location = $_POST["location"] ?? null;
    $date = $_POST["date"];
    $offender = $_POST["offender"] ?? null;
    $witnesses = $_POST["witnesses"] ?? null;

    $evidenceData = null;
    if (!empty($_FILES["evidence"]["tmp_name"])) {
        $evidenceData = file_get_contents($_FILES["evidence"]["tmp_name"]);
    }

    $stmt = $conn->prepare("INSERT INTO complaints (name, email, category, details, location, date, offender, witnesses, evidence) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", 
        $name, 
        $email, 
        $category, 
        $details, 
        $location, 
        $date, 
        $offender, 
        $witnesses, 
        $evidenceData
    );

    // Manually bind the blob
    $null = NULL;
    $stmt->send_long_data(8, $evidenceData); // 8 = 9th ? in bind_param (0-based index)

    if ($stmt->execute()) {
        echo "<script>alert('Complaint submitted successfully!'); window.location.href='complaint_form.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
header("Location: homepage.html"); 
exit();
?>
