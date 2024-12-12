<?php
session_start();
include 'header.php';
include 'db_connection.php';

// Check if user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: dashboard.php"); // Redirect to dashboard if logged in
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Hash the input password using MD5

    // Fetch user data from the database
    $sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Set session variables and redirect based on role
        $_SESSION['loggedin'] = true;
        $_SESSION['UserID'] = $row['UserID'];
        $_SESSION['Role'] = $row['Role'];
        $_SESSION['Name'] = $row['Name'];

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styles.css"> <!-- Update this line -->
    <title>Library Management System</title>
</head>

<body style="background-image: url('./res/library.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    <div class="form-container">
        <h2>Login</h2>
        <?php
        if (isset($error)) {
            echo "<p style='color:red;'>$error</p>";
        }
        ?>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
            <p>Don't have an account? <a href="register_user.php">Register here</a></p>
        </form>
            </div>
</body>

</html>
