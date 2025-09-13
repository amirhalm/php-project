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
