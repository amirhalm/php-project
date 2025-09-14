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
    <style>
           body { font-family: Arial, sans-serif;
              display: flex; 
              flex-direction: column;
              justify-content: center;
              align-items: center;
              height: 100vh;
              background-color: rgb(245, 245, 220);
              background-image: url('book.jpeg');
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
    <h1>Add New Book</h1>
    <div class="container">
    <form method="post">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Description:</label><br>
        <textarea name="description"></textarea><br><br>

        <label>Available:</label><br>
        <input type="number" name="avilable"><br><br>

        <label>Copies:</label><br>
        <input type="number" name="copies" required><br><br>

        <button type="submit">Save</button>
    </form>
    </div>
</body>
</html>
