<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'shopping_app');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to delete all items
function deleteAllItems($conn)
{
    // Check if there are items to delete
    $sqlCheck = "SELECT COUNT(*) AS count FROM shopping_list"; // Corrected table name
    $result = $conn->query($sqlCheck);
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        // Proceed to delete all items
        $sqlDelete = "DELETE FROM shopping_list"; // Corrected table name
        if ($conn->query($sqlDelete) === TRUE) {
            return "All items deleted successfully!";
        } else {
            return "Error deleting all items: " . $conn->error;
        }
    } else {
        return "No data to delete.";
    }
}

// Handle delete action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    $message = deleteAllItems($conn);

    // Use JavaScript for a user-friendly redirect with an alert
    echo "<script>alert('$message'); window.location.href = 'index.php?page=shopping_list';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete all</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<nav>
    <h1>Delete All Items</h1>
    <p>Are you sure you want to delete all items?</p>
    <form method="POST">
        <button type="submit" name="confirm_delete">Yes, Delete All</button>
        <button type="button" onclick="window.location.href='index.php?page=shopping_list';">Cancel</button>
    </form>
</nav>
</body>
</html>
