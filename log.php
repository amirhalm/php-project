<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (($password ===$user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["role"] = $user["role"];

            if ($user["role"] == "admin") {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: student_dashboard.php");
            }
            exit();
        } else {
            echo "invalid password!";
        }
    } else {
        echo "no user found with this email!";
    }
}
?>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
           body {
              font-family: Arial, sans-serif;
              display: flex; 
              justify-content: center;
              align-items: center;
              height: 100vh;
              background-color: rgb(245, 245, 220);
              background-image: url('WhatsApp Image 2025-09-12 at 7.05.21 PM.jpeg');
              opacity: 1;
                background-size: contain;
              background-repeat: no-repeat;
                background-position: center;
              filter: none; }
            .container {
                text-align: center;}
            input { margin: 5px 0; 
                padding: 8px;
                 width: 200px;; }
            button { padding: 8px 16px; 
                 background-color: #28a745; 
                 color: white; 
                 border: none; 
                 cursor: pointer; }
        </style>
    </head>
<body>  
    <div class="container">
<form method="POST">
        Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">login</button>
</form><br>
<p>Don't have an account? <a href="sign.php">Sign up</a></p>
</div>
</body>
</html>