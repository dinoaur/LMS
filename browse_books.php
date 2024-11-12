<?php
session_start();
include 'header.php';
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
}

// Initialize search term
$searchTerm = "";

// Check if form is submitted
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
}

// Fetch available books based on search term
$sql = "SELECT * FROM books WHERE AvailableCopies > 0 AND (Title LIKE ? OR Author LIKE ? OR Genre LIKE ?)";
$stmt = $conn->prepare($sql);
$searchTermWithWildcard = "%" . $searchTerm . "%";
$stmt->bind_param("sss", $searchTermWithWildcard, $searchTermWithWildcard, $searchTermWithWildcard);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>Browse Books</title>
</head>

<body style="background-image: url('./res/user.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="browse-books-container">
        <h2>Browse Books</h2>

        <!-- Search Form -->
        <form method="POST" action="">
            <input type="text" name="searchTerm" placeholder="Search for books..." value="<?php echo htmlspecialchars($searchTerm); ?>">
            <button type="submit" name="search">Search</button>
        </form>

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
                    echo "<tr><td colspan='6'>No books found matching your search</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>