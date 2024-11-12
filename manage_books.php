<?php
session_start();
include 'header.php';
include 'db_connection.php';

// Check if user is an admin
if ($_SESSION['Role'] !== 'Admin') {
    header("Location: index.php");
    exit;
}

// Handle book deletion
if (isset($_GET['delete'])) {
    $book_id = $_GET['delete'];
    $sql = "DELETE FROM books WHERE BookID = $book_id";
    if ($conn->query($sql) === TRUE) {
        echo "Book deleted successfully!";
    } else {
        echo "Error deleting book: " . $conn->error;
    }
}

// Handle adding a new book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year_published = $_POST['year_published'];
    $available_copies = $_POST['available_copies'];

    $sql = "INSERT INTO books (Title, Author, Genre, YearPublished, AvailableCopies)
            VALUES ('$title', '$author', '$genre', '$year_published', '$available_copies')";

    if ($conn->query($sql) === TRUE) {
        echo "New book added successfully!";
    } else {
        echo "Error adding book: " . $conn->error;
    }
}

// Fetch books data
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if (!$result) {
    echo "Error fetching books: " . $conn->error;
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Manage Books</title>
</head>

<body style="background-image: url('./res/admin.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="reports-container">
        <h2>Manage Books</h2>

        <!-- Add Book Form -->
        <form method="POST" action="" class="add-book-form">
            <h3>Add New Book</h3>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required>

            <label for="year_published">Year Published:</label>
            <input type="number" id="year_published" name="year_published" required>

            <label for="available_copies">Available Copies:</label>
            <input type="number" id="available_copies" name="available_copies" required>

            <button type="submit" name="add_book">Add Book</button>
        </form>

        <!-- Display Books -->
        <table class="admin-table">
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
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['Title'] . "</td>
                                <td>" . $row['Author'] . "</td>
                                <td>" . $row['Genre'] . "</td>
                                <td>" . $row['YearPublished'] . "</td>
                                <td>" . $row['AvailableCopies'] . "</td>
                                <td>
                                    <a href='edit_book.php?edit=" . $row['BookID'] . "'>Edit</a> | 
                                    <a href='manage_books.php?delete=" . $row['BookID'] . "' onclick=\"return confirm('Are you sure you want to delete this book?');\">Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No books available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>