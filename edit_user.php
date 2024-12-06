<?php
session_start();
include 'header.php';
include 'db_connection.php';

// Check if user is an Admin
if ($_SESSION['Role'] != 'Admin') {
    header("Location: dashboard.php");
    exit;
}

// Fetch the user data to edit
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM users WHERE UserID = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "No user specified.";
    exit;
}

// Handle form submission for editing the user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $password = isset($_POST['password']) && !empty($_POST['password']) 
                ? password_hash($_POST['password'], PASSWORD_DEFAULT) 
                : null;

    // Update query
    $sql = "UPDATE users SET Name = '$name'";
    if ($password) {
        $sql .= ", Password = '$password'";
    }
    $sql .= " WHERE UserID = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User updated successfully!');</script>";
        echo "<script>window.location.href='manage_users.php';</script>";
        exit;
    } else {
        echo "Error updating user: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Edit User</title>
</head>

<body style="background-image: url('./res/admin.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="edit-user-container">
        <h2>Edit User</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['Name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($user['Role']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="password">New Password (leave blank to keep current):</label>
                <input type="password" id="password" name="password" placeholder="Enter new password">
            </div>
            <div class="form-group">
                <button type="submit">Update</button>
                <a href="manage_users.php">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
