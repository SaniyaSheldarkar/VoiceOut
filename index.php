<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            echo "<script>alert('Login successful!'); window.location.href = 'homepage.html';</script>";
        } else {
            echo "<script>alert('Incorrect password'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No user found with this email'); window.history.back();</script>";
    }
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Anti-Bullying and Victim Support</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Nunito', sans-serif;
      display: flex;
      height: 100vh;
    }

    .left-side {
      flex: 1;
      background-image: url("images/loginbg.jpg");
      background-size: cover;
      background-position: center;
      position: relative;
    }

    .overlay {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      padding: 40px;
      text-align: center;
    }

    .overlay h1 {
      font-size: 36px;
      margin-bottom: 20px;
    }

    .right-side {
      flex: 1;
      background-color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 50px;
    }

    .login-form {
      width: 100%;
      max-width: 400px;
    }

    .login-form h2 {
      color: #4a69bd;
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      color: #333;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #4a69bd;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      margin-top: 10px;
      cursor: pointer;
    }

    button:hover {
      background-color: #3b5b9e;
    }

    .link {
      text-align: center;
      margin-top: 15px;
      color: #555;
    }

    .link a {
      color: #4a69bd;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="left-side">
    <div class="overlay">
      <div>
        <h1>Hey there.. Welcome Back</h1>
        <p>Log in to continue getting support. Every voice matters.</p>
      </div>
    </div>
  </div>

  <div class="right-side">
    <div class="login-form">
      <h2>Anti-Bullying and Victim Support System</h2>
      <form onsubmit="redirectToHomepage(event)">
        <div class="form-group">
          <label>Email</label>
          <input type="email" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" required>
        </div>
        <button type="submit">Login</button>
        <div class="link">
          Don't have an account? <a href="signup.html">Signup</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    function redirectToHomepage(e) {
      e.preventDefault();
      // Add your login logic here if needed (e.g., validation)
      window.location.href = "homepage.html";
    }
  </script>
</body>
</html>



