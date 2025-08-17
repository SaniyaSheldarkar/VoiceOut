<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "root123"; // your MySQL password
$dbname = "anti";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch complaints
$sql = "SELECT * FROM complaints ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <style>
    body {font-family: Arial, sans-serif;background: #f4f6f9;margin: 0;padding: 0;}
    header {background: #007bff;color: white;padding: 15px;text-align: center;}
    .container {padding: 20px;}
    h2 {color: #333;}
    table {width: 100%;border-collapse: collapse;margin-top: 20px;background: white;
           box-shadow: 0px 4px 10px rgba(0,0,0,0.1);border-radius: 8px;overflow: hidden;}
    table th, table td {padding: 12px;text-align: left;border-bottom: 1px solid #ddd;}
    table th {background: #007bff;color: white;}
    table tr:hover {background: #f1f1f1;}
    .status-pending {color: #ff9800;font-weight: bold;}
    .status-resolved {color: green;font-weight: bold;}
    .btn {padding: 6px 12px;border: none;border-radius: 4px;cursor: pointer;}
    .btn-resolve {background: green;color: white;}
    .btn-delete {background: red;color: white;}
  </style>
</head>
<body>
  <header>
    <h1>Admin Dashboard</h1>
  </header>

  <div class="container">
    <h2>Complaints List</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Complaint</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      <?php
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['student_name']."</td>
                <td>".$row['complaint']."</td>
                <td>".$row['created_at']."</td>
                <td>".($row['status']=='Resolved' ? "<span class='status-resolved'>Resolved</span>" : "<span class='status-pending'>Pending</span>")."</td>
                <td>
                  <form method='POST' action='resolve_complaint.php' style='display:inline;'>
                    <input type='hidden' name='id' value='".$row['id']."'>
                    <button type='submit' class='btn btn-resolve'>Mark Resolved</button>
                  </form>
                  <form method='POST' action='delete_complaint.php' style='display:inline;'>
                    <input type='hidden' name='id' value='".$row['id']."'>
                    <button type='submit' class='btn btn-delete'>Delete</button>
                  </form>
                </td>
              </tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No complaints found</td></tr>";
      }
      ?>
    </table>
  </div>
</body>
</html>
