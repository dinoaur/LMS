<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Library Management System</title>
</head>

<body style="background-image: url('./res/admin.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="navbar-logo">LMS</a>
            <ul class="navbar-menu">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <?php if ($_SESSION['Role'] == 'Admin'): ?>
                        <li><a href="manage_users.php">Manage Users</a></li>
                        <li><a href="reports.php">Reports</a></li>
                    <?php elseif ($_SESSION['Role'] == 'Librarian'): ?>
                        <li><a href="catalog.php">Manage Catalog</a></li>
                        <li><a href="borrow_book.php">Borrow Books</a></li>
                    <?php elseif ($_SESSION['Role'] == 'User'): ?>
                        <li><a href="browse_books.php">Browse Books</a></li>
                        <li><a href="my_account.php">My Account</a></li>
                    <?php endif; ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="index.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</body>

</html>
