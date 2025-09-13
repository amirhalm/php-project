<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $role = "student"; // أي حد يسجل يكون طالب افتراضياً

    $sql = "INSERT INTO users (name, email, password, role) 
            VALUES ('$name', '$email', '$password', '$role')";
    
    if ($conn->query($sql) === TRUE) {
        echo "sucssefull sigin <a href='log.php'>login<a>";
    } else {
        echo "falied " . $conn->error;
    }
}
?>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
           body { font-family: Arial, sans-serif;
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
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    password: <input type="password" name="password" required><br>
    <button type="submit">signin</button>
</form>
</div>
</body>
</html>