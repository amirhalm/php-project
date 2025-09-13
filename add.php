<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $avilable = $_POST['avilable'] ;
    $copies = $_POST['copies'];

    $sql = "INSERT INTO books (title, description, avilable, copies) 
            VALUES ('$title', '$description', '$avilable', '$copies')";

    if ($conn->query($sql)) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
</head>
<body>
    <h1>Add New Book</h1>
    <form method="post">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Description:</label><br>
        <textarea name="description"></textarea><br><br>

        <label>Available:</label>
        <input type="number" name="avilable"><br><br>

        <label>Copies:</label><br>
        <input type="number" name="copies" required><br><br>

        <button type="submit">Save</button>
    </form>
</body>
</html>
