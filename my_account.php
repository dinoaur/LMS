<?php
session_start();
include 'header.php';
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
}

// Get user information
$user_id = $_SESSION['UserID'];
$sql = "SELECT * FROM users WHERE UserID = $user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// Handle book return
if (isset($_GET['return'])) {
    $transaction_id = $_GET['return'];

    // Update transaction to mark the book as returned
    $return_date = date('Y-m-d');
    $sql = "UPDATE transactions SET ReturnDate = '$return_date' WHERE TransactionID = $transaction_id AND UserID = $user_id";
    $conn->query($sql);

    // Update available copies in books table
    $sql = "UPDATE books SET AvailableCopies = AvailableCopies + 1 
            WHERE BookID = (SELECT BookID FROM transactions WHERE TransactionID = $transaction_id)";
    $conn->query($sql);

    echo "Book returned successfully!";
}

// Get user's borrowed books
$sql = "SELECT b.Title, b.Author, t.TransactionID, t.BorrowDate, t.DueDate 
        FROM books b 
        INNER JOIN transactions t ON b.BookID = t.BookID 
        WHERE t.UserID = $user_id AND t.ReturnDate IS NULL";
$borrowed_books = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>My Account</title>
</head>

<body style="background-image: url('./res/user.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="my-account-container">
        <h2>My Account</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['Name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['Email']); ?></p>
        <p><strong>Role:</strong> <?php echo htmlspecialchars($user['Role']); ?></p>

        <h3>Borrowed Books</h3>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Borrow Date</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($borrowed_books->num_rows > 0) {
                    while ($book = $borrowed_books->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($book['Title']) . "</td>
                                <td>" . htmlspecialchars($book['Author']) . "</td>
                                <td>" . htmlspecialchars($book['BorrowDate']) . "</td>
                                <td>" . htmlspecialchars($book['DueDate']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No borrowed books</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
