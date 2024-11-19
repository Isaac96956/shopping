<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_app');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the item name before deletion
    $result = $conn->query("SELECT item_name FROM shopping_list WHERE id=$id");
    $row = $result->fetch_assoc();
    $item_name = $row['item_name'];
    
    // Attempt to delete the item
    if ($conn->query("DELETE FROM shopping_list WHERE id=$id") === TRUE) {
        // Redirect back with success message and item name
        header("Location: index.php?page=shopping_list&delete=success&item=" . urlencode($item_name));
    } else {
        // Redirect back with error message
        header("Location: index.php?page=shopping_list&delete=error");
    }
    exit;
}
?>
