<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'db.php';
$user = null;
if (isset($_GET['id'])){
$id=$_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id='$id'");
    $user =$result->fetch_assoc();};


if ($_SERVER['REQUEST_METHOD'] === 'POST' &&isset($_POST['update'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $role=$_POST['role'];
    $password=$_POST['password'];

    if (!empty($password)){
    $hashed = $password;
$sql = "UPDATE users SET name='$name', email='$email', role='$role', password='$hashed' WHERE id=$id";}
     else {
     $sql = "UPDATE users SET name='$name', email='$email', role='$role' WHERE id='$id'";
    }

    if ($conn->query($sql)) {
        echo "تم التحديث بنجاح";
         header("Location: admin_dashboard.php")
         ;
        exit;
    } else {
        echo "<p style='color:red'>something wrong happen " . $conn->error . "</p>";}
}


?>

<?php if ($user): ?>
    <html>
<head>
    <meta charset="UTF-8">
    <title>users edit</title>
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
    <h1>user edit</h1>
<form method="POST" action="">
<input type="hidden" name="id" value="<?=$user['id'] ?>">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?=$user['name'] ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?=$user['email'] ?>" required><br><br>

    <label>Role:</label><br>
    <input type="text" name="role" value="<?=$user['role'] ?>" required><br><br>

    <label>Password (اختياري للتحديث):</label><br>
    <input type="password" name="password" placeholder="Enter new password"><br><br>

    <button type="submit"name="update" >Update</button>
</form>
<?php else: ?>
    <p>no user with that ID</p>
<?php endif; ?>
</body>
</html>