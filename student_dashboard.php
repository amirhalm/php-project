<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require "db.php";


if (!isset($_SESSION["role"]) || $_SESSION["role"] != "student") {
    header("Location: login.php");
    exit();
}


$user_id = $_SESSION["user_id"];
$user_sql = "SELECT * FROM users WHERE id=$user_id";
$user_result = $conn->query($user_sql);
$user = $user_result->fetch_assoc();


if (isset($_POST["borrow"])) {
    $book_id = $_POST["book_id"];

    
    $check_sql = "SELECT * FROM books WHERE id=$book_id AND avilable > 0";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows == 1) {
        
        $conn->query("INSERT INTO borrows (user_id, book_id) VALUES ($user_id, $book_id)");

    
        $conn->query("UPDATE books SET avilable = avilable - 1 WHERE id=$book_id");

        echo "<p style='color:green'>borrow sucsse</p>";
    } else {
        echo "<p style='color:red'>unavalible book</p>";
    }
}


$books_sql = "SELECT * FROM books WHERE avilable > 0";
$books_result = $conn->query($books_sql);
?>
<html>
    <head>
        <title>Student Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
       body {
    font-family: Arial, sans-serif;
    max-width: 800px;
    margin: 20px auto;
      background-color: rgb(245, 245, 220);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    direction: rtl; 
    text-align: left; 
    line-height: 1.6;
    background-image: url('WhatsApp Image 2025-09-12 at 7.05.21 PM.jpeg');
    background-size: contain;
   
    background-position: cover;
    filter: none;
  }
  h2, h3 {
    margin-top: 30px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
     background-color: #E2B76D;
    margin-bottom: 30px;
  }
  th, td {
    padding: 10px;
    text-align: left;
  }
  form {
    margin: 0;
  }
  a {
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    color: #007bff;

  }
  a {
  color: red;
  text-decoration: none;
  border: 1px solid red;
    padding: 5px 10px;
}

a:hover {
  text-decoration: underline;
}
button {
    padding: 8px 16px; 
    background-color: rgb(245, 245, 220) ; 
    color: brown; 
    border: none; 
    cursor: pointer; 
    border-radius: 4px;
  }
  button:hover {
    background-color:#F0C36D;
  }
</style>
    </head>
<body>
<h2>مرحباً <?php echo $user["name"]; ?> 👋</h2>
<p>الإيميل: <?php echo $user["email"]; ?></p>

<h3>📚 Available books for borrowing:</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>title</th>
        <th>description</th>
        <th>avilable books</th>
        <th>action</th>
    </tr>
    <?php while($book = $books_result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $book["title"]; ?></td>
            <td><?php echo $book["description"]; ?></td>
            <td><?php echo $book["avilable"]; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="book_id" value="<?php echo $book["id"]; ?>">
                    <button type="submit" name="borrow">borrow</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

<h3>📖 Borrowed Books</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>title</th>
        <th>Date</th>
    </tr>
    <?php
    $borrow_sql = "SELECT b.title, br.borrow_time 
                   FROM borrows br
                   JOIN books b ON br.book_id = b.id
                   WHERE br.user_id = $user_id";
    $borrow_result = $conn->query($borrow_sql);

    while($row = $borrow_result->fetch_assoc()) {
        echo "<tr><td>{$row['title']}</td><td>{$row['borrow_time']}</td></tr>";
    }
    ?>
</table>

<br>
<a href="logout.php" >logout</a>
</body>
</html>