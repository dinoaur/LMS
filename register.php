<?php
include 'header.php';
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Hashing the password using MD5
    $name = $_POST['name'];
    $role = $_POST['role']; // Role is now selected by the user or admin

    $sql = "INSERT INTO users (Email, Password, Name, Role, RegistrationDate) 
            VALUES ('$email', '$password', '$name', '$role', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>

<body style="background-image: url('./res/library.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="form-container">
        <h2>Register</h2>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="role">Role:</label>
            <select id="role" name="role" required>

                <option value="User">General User</option>
            </select>

            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>
