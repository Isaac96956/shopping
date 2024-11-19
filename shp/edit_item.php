<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_app');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];

    // Update the item in the database
    $conn->query("UPDATE shopping_list SET item_name='$item_name', quantity='$quantity' WHERE id=$id");

    // Redirect back to shopping_list.php with success message
    header('Location: index.php?page=shopping_list&update=success');
    exit();
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM shopping_list WHERE id=$id");
    $item = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Item</h1>
    <form action="edit_item.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <input type="text" name="item_name" value="<?php echo $item['item_name']; ?>" required>
        <input type="text" name="quantity" value="<?php echo $item['quantity']; ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
