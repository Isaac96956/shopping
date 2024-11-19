<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_app');

// Check if form data is received
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Check if status was sent, if not set it to 'incomplete'
    $status = isset($_POST['status']) ? 'complete' : 'incomplete';

    // Update the item status in the database
    $conn->query("UPDATE shopping_list SET status='$status' WHERE id=$id");

    // Redirect back to the shopping list page
    header('Location: index.php?page=shopping_list');
}
?>
