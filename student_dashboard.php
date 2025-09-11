<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require "db.php";

// لو مش طالب يرجعه للـ login
if (!isset($_SESSION["role"]) || $_SESSION["role"] != "student") {
    header("Location: login.php");
    exit();
}

// بيانات الطالب
$user_id = $_SESSION["user_id"];
$user_sql = "SELECT * FROM users WHERE id=$user_id";
$user_result = $conn->query($user_sql);
$user = $user_result->fetch_assoc();

// لو ضغط استعارة كتاب
if (isset($_POST["borrow"])) {
    $book_id = $_POST["book_id"];

    // تأكد إن الكتاب متاح
    $check_sql = "SELECT * FROM books WHERE id=$book_id AND avilable > 0";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows == 1) {
        // أضف استعارة
        $conn->query("INSERT INTO borrows (user_id, book_id) VALUES ($user_id, $book_id)");

        // قلل النسخة المتاحة
        $conn->query("UPDATE books SET avilable = avilable - 1 WHERE id=$book_id");

        echo "<p style='color:green'>borrow sucsse</p>";
    } else {
        echo "<p style='color:red'>unavalible book</p>";
    }
}

// عرض الكتب المتاحة
$books_sql = "SELECT * FROM books WHERE avilable > 0";
$books_result = $conn->query($books_sql);
?>

<h2>مرحباً <?php echo $user["name"]; ?> 👋</h2>
<p>الإيميل: <?php echo $user["email"]; ?></p>

<h3>📚 الكتب المتاحة للاستعارة:</h3>
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
<a href="logout.php">logout</a>