<?php

require 'db.php';

$books = $conn->query("SELECT * FROM books");

$users = $conn->query("SELECT * FROM users");

$borrows = $conn->query("
    SELECT users.name AS user_name, books.title AS book_title, borrows.borrow_time
    FROM borrows
    JOIN users ON borrows.user_id = users.id
    JOIN books ON borrows.book_id = books.id
");

//بدايه اللى ضفته

;//نهايه اللى ضفته
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        

        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 90%;
            background: rgba(0,0,0,0.6);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        h2 {
            margin-top: 40px;
            background: rgba(0,0,0,0.7);
            padding: 10px;
            border-radius: 8px;
        }
        a {
            color: brown;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>

    
    <h2>📚 Books</h2>
    <a href="add.php">➕ Add New Book</a>
    <table>
        <tr>
            <th>iD</th>
            <th>title</th>
            <th>description</th>
            <th>avilable</th>
            <th>copies</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $books->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['copies'] ? '✅ Yes' : '❌ No' ?></td>
            <td><?= $row['avilable'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">✏ Edit</a> | 
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    
    <h2>👤 Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>password</th>
            <th>email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $users->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
             <td><?= $row['password'] ?></td>
              <td><?= $row['email'] ?></td>
            <td><?= $row['role'] ?></td>
            <td>
                <a href="usersedit.php?id=<?= $row['id'] ?>">✏ Edit</a> | 
                <a href="deleteusers.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
       </td>
            </tr>
        <?php } ?>
    </table>



<h2>📖 Borrows</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>User</th>
        <th>Book</th>
        <th>Borrow Time</th>
    </tr>
    <?php
    
    $borrows = $conn->query("SELECT * FROM borrows");

    if($borrows && $borrows->num_rows > 0) {
        while($row = $borrows->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['book_id'] ?></td>
                <td><?= $row['borrow_time'] ?></td>
            </tr>
    <?php } 
    } else {
        echo "<tr><td colspan='3'>No borrows found</td></tr>";
    }
    ?>
</table>
</body>
</html>
