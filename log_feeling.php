<?php
$servername = "localhost";
$username = "root";
$password = "vansh@2244"; 
$dbname = "anti"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$feeling = $_POST['feeling'];

$sql = "INSERT INTO feelings_log (feeling, count) VALUES (?, 1)
        ON DUPLICATE KEY UPDATE count = count + 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $feeling);
$stmt->execute();

$stmt->close();
$conn->close();
?>
