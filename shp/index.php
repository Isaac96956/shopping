<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping List</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <!-- <li class="logo">
                <a href="index.php?page=dashboard">
                    <img src="./image/logo1.png" alt="Shopping Page"> 
                </a>
            </li> -->
            <li>
            <a href="index.php?page=dashboard">
            <img src="./image/logo1.png" alt="Shopping Page"> 
            </a>
            </li>
            <li><a href="index.php?page=home">Home</a></li>
            <li><a href="index.php?page=dashboard">Dashboard</a></li>
            <li class="dropdown-toggle">
                <a href="javascript:void(0)">Menu <i class="fa-solid fa-caret-down"></i></a>
                <ul class="dropdown">
                    <li><a href="index.php?page=shopping_list">Shopping List</a></li><br><br>
                    <li><a href="index.php?page=apps">Apps</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Content Section -->
    <div>
        <?php
        // Handle the page parameter to include content
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'home') {
                include 'home.php';
            } elseif ($page == 'dashboard') {
                include 'dashboard.php';
            } elseif ($page == 'shopping_list') {
                include 'shopping_list.php';
            } elseif ($page == 'apps') {
                include 'apps.php';
            } else {
                echo "<h1>Page not found</h1>";
            }
        } 
        ?>
    </div>

    <script>
        // Toggle the dropdown menu visibility on "Menu" click
        document.querySelector('.dropdown-toggle').addEventListener('click', function() {
            // Toggle the 'active' class to show/hide the dropdown
            this.classList.toggle('active');
        });
    </script>

    
</body>
</html>
