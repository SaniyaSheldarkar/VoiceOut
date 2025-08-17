
<?php
$servername = "localhost";
$username = "root";
$password = "root123";  // your MySQL password
$dbname = "anti";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
