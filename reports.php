<?php
session_start();
include 'header.php';
include 'db_connection.php';

// Check if user is admin
if (!isset($_SESSION['loggedin']) || $_SESSION['Role'] !== 'Admin') {
    header("Location: index.php");
    exit;
}

// Fetch data for reports
$books_sql = "SELECT Title, Author, Genre, YearPublished, AvailableCopies FROM books";
$books_result = $conn->query($books_sql);

$borrowed_sql = "SELECT b.Title, u.Name AS BorrowedBy, t.BorrowDate, t.DueDate 
                 FROM transactions t
                 JOIN books b ON t.BookID = b.BookID
                 JOIN users u ON t.UserID = u.UserID
                 WHERE t.ReturnDate IS NULL";
$borrowed_result = $conn->query($borrowed_sql);

$overdue_sql = "SELECT b.Title, u.Name AS BorrowedBy, t.BorrowDate, t.DueDate 
                FROM transactions t
                JOIN books b ON t.BookID = b.BookID
                JOIN users u ON t.UserID = u.UserID
                WHERE t.ReturnDate IS NULL AND t.DueDate < CURDATE()";
$overdue_result = $conn->query($overdue_sql);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Library Reports</title>
</head>

<body style="background-image: url('./res/admin.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="reports-container">
        <h2>Library Reports</h2>

        <!-- Books Report -->
        <h3>All Books</h3>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year Published</th>
                    <th>Available Copies</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($book = $books_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $book['Title']; ?></td>
                        <td><?php echo $book['Author']; ?></td>
                        <td><?php echo $book['Genre']; ?></td>
                        <td><?php echo $book['YearPublished']; ?></td>
                        <td><?php echo $book['AvailableCopies']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Borrowed Books Report -->
        <h3>Currently Borrowed Books</h3>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Borrowed By</th>
                    <th>Borrow Date</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($borrowed = $borrowed_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $borrowed['Title']; ?></td>
                        <td><?php echo $borrowed['BorrowedBy']; ?></td>
                        <td><?php echo $borrowed['BorrowDate']; ?></td>
                        <td><?php echo $borrowed['DueDate']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Overdue Books Report -->
        <h3>Overdue Books</h3>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Borrowed By</th>
                    <th>Borrow Date</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($overdue = $overdue_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $overdue['Title']; ?></td>
                        <td><?php echo $overdue['BorrowedBy']; ?></td>
                        <td><?php echo $overdue['BorrowDate']; ?></td>
                        <td><?php echo $overdue['DueDate']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>