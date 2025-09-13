<?php
require 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: admin_dashboard.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>