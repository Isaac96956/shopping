<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_app');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];

    // Prepare the SQL statement with the correct number of placeholders
    $stmt = $conn->prepare("INSERT INTO shopping_list (item_name, quantity) VALUES (?, ?)");
    
    // Bind both parameters
    $stmt->bind_param('ss', $item_name, $quantity); // 's' for string and 'i' for integer where i is for number only
    
    // Execute the query
    if ($stmt->execute()) {
        header('Location: index.php?page=shopping_list&add=success');
    } else {
        // Redirect back with error message if something goes wrong
        header('Location: index.php?page=shopping_list&add=error');
    }

    $stmt->close();
}
$conn->close();
?>
