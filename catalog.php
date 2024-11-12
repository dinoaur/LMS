<?php
session_start();
include 'header.php';
include 'db_connection.php';

// Fetch all books
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Library Catalog</title>
</head>

<body style="background-image: url('./res/user.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="catalog-container">
        <h2>Library Catalog</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year Published</th>
                    <th>Available Copies</th>
                    <?php if (isset($_SESSION['loggedin'])) { ?>
                        <th>Action</th>
                    <?php } ?>
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
                                <td>" . $row['AvailableCopies'] . "</td>";

                        // Show "Borrow" link only if the user is logged in and there are copies available
                        if (isset($_SESSION['loggedin']) && $row['AvailableCopies'] > 0) {
                            echo "<td><a href='borrow_book.php?borrow=" . $row['BookID'] . "'>Borrow</a></td>";
                        } elseif (isset($_SESSION['loggedin'])) {
                            echo "<td>Out of Stock</td>";
                        }

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No books found in the catalog.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>