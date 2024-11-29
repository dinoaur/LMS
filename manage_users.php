<?php
session_start();
include 'header.php';
include 'db_connection.php';

// Check if user is an Admin
if ($_SESSION['Role'] != 'Admin') {
    header("Location: dashboard.php");
    exit;
}

// Handle delete request
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $sql = "DELETE FROM users WHERE UserID = $user_id";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully!";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

$sql = "SELECT * FROM users WHERE UserID != " . $_SESSION['UserID'];
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Manage Users</title>
</head>

<body style="background-image: url('./res/admin.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="reports-container">
        <h2>Manage Users</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['Name'] . "</td>
                                <td>" . $row['Email'] . "</td>
                                <td>" . $row['Role'] . "</td>
                                <td>
                                    <a href='edit_user.php?user_id=" . $row['UserID'] . "'>Edit</a> |
                                    <a href='manage_users.php?delete=" . $row['UserID'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
