<?php
$servername = "localhost";
$username = "root";
$password = "root123"; 
$dbname = "anti";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE complaints SET status='Resolved' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin_dashboard.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>
