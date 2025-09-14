<?php
require 'db.php';

$id = $_GET['id'];
$book = $conn->query("SELECT * FROM books WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $avilable = isset($_POST['avilable']) ;
    $copies = $_POST['copies'];

    $sql = "UPDATE books SET 
                title='$title', 
                description='$description', 
                avilable='$avilable', 
                copies='$copies' 
            WHERE id=$id";

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
    <title>Edit Book</title>
     <style>
           body {
              font-family: Arial, sans-serif;
              display: flex; 
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
    <h1>Edit Book</h1>
    <form method="post">
        <label>Title:</label><br>
        <input type="text" name="title" value="<?= $book['title'] ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description"><?= $book['description'] ?></textarea><br><br>

        <label>Available:</label>
        <input type="checkbox" name="avilable" <?= $book['avilable'] ? 'checked' : '' ?>><br><br>

        <label>Copies:</label><br>
        <input type="number" name="copies" value="<?= $book['copies'] ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
