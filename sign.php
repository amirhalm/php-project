<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // تشفير الباسورد
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

<form method="POST">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    password: <input type="password" name="password" required><br>
    <button type="submit">signin</button>
</form>