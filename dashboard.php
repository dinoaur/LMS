<?php
session_start();
include 'header.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>User Dashboard</title>
</head>

<body style="background-image: url('./res/admin.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="dashboard-container">
        <h2>Welcome, <?php echo $_SESSION['Name']; ?>!</h2>
        <p>Your role: <?php echo $_SESSION['Role']; ?></p>

        <ul>
            <?php if ($_SESSION['Role'] == 'Admin') { ?>
                <li><a href="add_book.php">Add a New Book</a></li>
                <li><a href="register.php">Register New User</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_books.php">Manage Books</a></li>
            <?php } ?>
            <li><a href="borrow_book.php">Borrow a Book</a></li>
            <li><a href="view_books.php">View Available Books</a></li>
        </ul>

        <p><a href="logout.php">Logout</a></p>
    </div>
</body>


</html>