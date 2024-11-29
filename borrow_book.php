<?php
session_start();
include 'header.php';
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
} // Handle book borrowing
if (isset($_GET['borrow'])) {
    $book_id = $_GET['borrow'];
    $user_id = $_SESSION['UserID'];

    // Check if the user already borrowed the book
    $sql = "SELECT * FROM transactions WHERE UserID = $user_id AND BookID = $book_id AND ReturnDate IS NULL";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User has already borrowed this book
        "";
    } else {
        // Check if book is available
        $sql = "SELECT AvailableCopies FROM books WHERE BookID = $book_id";
        $result = $conn->query($sql);
        $book = $result->fetch_assoc();

        if ($book['AvailableCopies'] > 0) {
            // Insert into transactions and update book availability
            $borrow_date = date('Y-m-d');
            $due_date = date('Y-m-d', strtotime('+14 days'));
            $sql = "INSERT INTO transactions (UserID, BookID, BorrowDate, DueDate) 
                    VALUES ($user_id, $book_id, '$borrow_date', '$due_date')";
            $conn->query($sql);

            // Update available copies
            $sql = "UPDATE books SET AvailableCopies = AvailableCopies - 1 WHERE BookID = $book_id";
            $conn->query($sql);

            echo "";
        } else {
            echo "<script>alert('No copies available.');</script>";
        }
    }
}



// Fetch available books
$sql = "SELECT * FROM books WHERE AvailableCopies > 0";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Borrow Book</title>
</head>

<body style="background-image: url('./res/user.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="borrow-book-container">
        <h2>Borrow a Book</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year Published</th>
                    <th>Available Copies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // PHP logic remains unchanged
                if (isset($_GET['borrow'])) {
                    $book_id = $_GET['borrow'];
                    $user_id = $_SESSION['UserID'];

                    // Check if user already borrowed this book
                    $sql = "SELECT * FROM transactions WHERE UserID = $user_id AND BookID = $book_id AND ReturnDate IS NULL";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                showPopup('You have already borrowed this book. Please return it before borrowing again.');
                            });
                        </script>";
                    } else {
                        $sql = "SELECT AvailableCopies FROM books WHERE BookID = $book_id";
                        $result = $conn->query($sql);
                        $book = $result->fetch_assoc();

                        if ($book['AvailableCopies'] > 0) {
                            $borrow_date = date('Y-m-d');
                            $due_date = date('Y-m-d', strtotime('+14 days'));
                            $sql = "INSERT INTO transactions (UserID, BookID, BorrowDate, DueDate) 
                                    VALUES ($user_id, $book_id, '$borrow_date', '$due_date')";
                            $conn->query($sql);

                            $sql = "UPDATE books SET AvailableCopies = AvailableCopies - 1 WHERE BookID = $book_id";
                            $conn->query($sql);

                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    showPopup('Book borrowed successfully!');
                                });
                            </script>";
                        } else {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    showPopup('No copies available.');
                                });
                            </script>";
                        }
                    }
                }

                // Display available books
                $sql = "SELECT * FROM books WHERE AvailableCopies > 0";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['Title'] . "</td>
                                <td>" . $row['Author'] . "</td>
                                <td>" . $row['Genre'] . "</td>
                                <td>" . $row['YearPublished'] . "</td>
                                <td>" . $row['AvailableCopies'] . "</td>
                                <td><a href='borrow_book.php?borrow=" . $row['BookID'] . "'>Borrow</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No books available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Popup structure -->
    <div id="popup" class="popup-overlay">
        <div class="popup-content">
            <h3 id="popup-message"></h3>
            <button onclick="closePopup()">Close</button>
        </div>
    </div>

    <script>
        function showPopup(message) {
            document.getElementById('popup-message').textContent = message;
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>

</html>
