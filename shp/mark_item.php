<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_app');
$id = $_GET['id'];
$status = $_GET['status'];
$conn->query("UPDATE shopping_list SET status='$status' WHERE id=$id");
header('Location: index.php?page=shopping_list');
?>
