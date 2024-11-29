<?php
session_start();
include 'header.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>Help</title>
</head>

<body style="background-image: url('./res/admin.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="faq-container">
      <h1>Help</h1>
        <h2>Frequently Asked Questions</h2>
        <ul>
            <li><strong>How do I borrow a book?</strong>
                <p>To borrow a book, go to the Search section, find the book you want, and click 'Borrow'.</p>
            </li>
            <li><strong>What if I return a book late?</strong>
                <p>Late returns may incur fines. Please refer to our library policies for more details.</p>
            </li>
            <li><strong>How can I contact support?</strong>
                <p>You can contact us via email at <a href="mailto:support@library.com">support@library.com</a> or call us at (123) 456-7890.</p>
            </li>
        </ul>

        <h2>Contact Support</h2>
        <form action="send_support_request.php" method="post">
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <input type="submit" value="Send Message">
        </form>

        <h2>Feedback</h2>
        <form action="submit_feedback.php" method="post">
            <label for="feedback">Your Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>
            <input type="submit" value="Submit Feedback">
        </form>
    </div>
    </body>
