<?php
include 'header.php';
include 'db_connection.php';

if ($_SESSION['Role'] != 'Admin' && $_SESSION['Role'] != 'Librarian') {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $isbn = $_POST['isbn'];
    $year_published = $_POST['year_published'];
    $total_copies = $_POST['total_copies'];

    $sql = "INSERT INTO books (Title, Author, Genre, ISBN, YearPublished, TotalCopies, AvailableCopies, AddedDate) 
            VALUES ('$title', '$author', '$genre', '$isbn', '$year_published', '$total_copies', '$total_copies', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "New book added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="form-container">
        <h2>Add New Book</h2>
        <form method="POST" action="">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required>

            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required>

            <label for="year_published">Year Published:</label>
            <input type="number" id="year_published" name="year_published" required>

            <label for="total_copies">Total Copies:</label>
            <input type="number" id="total_copies" name="total_copies" required>

            <button type="submit">Add Book</button>
        </form>
    </div>
</body>

</html>
