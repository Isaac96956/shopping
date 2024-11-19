<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_app');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping List</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
        /* Styles for the alert message */

    </style>
</head>
<body>
    
<script>
        // Function to hide the alert message after a few seconds
        window.onload = function() {
            const alert = document.getElementById("updateAlert");
            if (alert) {
                setTimeout(function() {
                    alert.style.display = "none";
                }, 5000); // Hide after 5 seconds
            }
        };
    </script>

<!-- Confirmation delete Message -->
<?php if (isset($_GET['delete'])): ?>
    <div class="alert <?php echo ($_GET['delete'] == 'success') ? 'success' : 'error'; ?>">
        <?php
        if ($_GET['delete'] == 'success' && isset($_GET['item'])) {
            // Display the name of the deleted item, sanitized for HTML
            echo "Item '" . htmlspecialchars($_GET['item']) . "' deleted successfully!";
        } else {
            echo "Error deleting item. Please try again.";
        }
        ?>
    </div>
<?php endif; ?>







<!-- Confirmation Message for add -->
<?php if (isset($_GET['add'])): ?>
    <div class="alert <?php echo ($_GET['add'] == 'success') ? 'success' : 'error'; ?>">
        <?php
        echo ($_GET['add'] == 'success') ? "Item added successfully!" : "Error adding item. Please try again.";
        ?>
    </div>
<?php endif; ?>

<!-- confimation for success edit -->
<?php
// Check if the update parameter exists in the URL and display the success message
if (isset($_GET['update']) && $_GET['update'] === 'success') {
    echo '<div class="alert show" id="updateAlert">Updated Successfully!</div>';
}
?>

<nav class="card">
    <!-- Shopping List Form -->
<h1>Shopping List</h1>
<form action="add_item.php" method="POST">
    <input type="text" name="item_name" placeholder="Enter item name" required><br><br>
    <input type="text" name="quantity" placeholder="Enter quantity" required><br><br>
    <button type="submit">Add Item</button>
    <form action="delete_all.php" method="POST">
    <button type="submit" onclick="return confirm('Are you sure you want to delete all items?');">Delete All</button>
    </form>
</form>



<!-- Display Shopping List -->
<table>
    <thead>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // Fetch and display items from the database
    $result = $conn->query("SELECT * FROM shopping_list");
    while ($row = $result->fetch_assoc()) {
        // Check if the item is marked as 'complete'
        $checked = $row['status'] == 'complete' ? 'checked' : ''; // Initialize $checked based on status
        
        echo "<tr>
            <td>{$row['item_name']}</td>
            <td>{$row['quantity']}</td>
            <td>{$row['status']}</td>
            
            <td>
                <!-- Form to update status with checkbox -->
                <form action='update_status.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <input type='checkbox' name='status' value='complete' $checked onchange='this.form.submit()'>
                </form>
                <a href='edit_item.php?id={$row['id']}'>Edit</a> 
                <a href='delete_item.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete item: " . htmlspecialchars($row['item_name']) . "?\")'>Delete</a>
            </td>
        </tr>";
    }
    ?>
</tbody>

</table>
</nav>

<!-- JavaScript for auto-hide alert message -->
<script>
    window.onload = function() {
        const alert = document.querySelector('.alert');
        if (alert) {
            // Show the alert for a few seconds
            alert.style.display = 'block';
            
            // Hide it after 4 seconds (adjust as needed)
            setTimeout(function() {
                alert.style.display = 'none';
            }, 4000);
        }
    };
    
</script>
<script>
    function confirmDeletion() {
        const confirmed = confirm("Are you sure you want to delete all items? This action cannot be undone.");
        if (confirmed) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
</body>
</html>
