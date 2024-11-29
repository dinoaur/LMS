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
    <title>Rules</title>
</head>

<body style="background-image: url('./res/admin.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="rule-container">
      <h1>Rules</h1>
      <h2>Book Checkout Rules</h2>
      <ul>
        <li>Books should be issued to registered members only</li>
        <li>A user can check out a specific number of booksat a time</li>
        <li>Books can be issued for a predefined period</li>
        <li>If the book is overdue, a late fee can be charged</li>
        <li>A user should not be able to checkout the same book more than once if it is already checkout</li>
      </ul>
      <h2>Book Return Rules</h2>
      <ul>
            <li>Books should be returned on time to avoid fines.</li>
            <li>If a book is returned late, the overdue fine will be calculated based on the number of days it was overdue.</li>
            <li>Members can renew books if no other member has reserved the book.</li>
            <li>Books can be returned to the library directly or through a dropbox system.</li>
      </ul>
      
      <h2>Membership Rules</h2>
      <ul>
            <li>Users need to sign up with valid credentials (name, address, contact info, etc.).</li>
            <li>Users must be approved by the library staff (after verifying documents).</li>
            <li>Users are assigned membership types, such as Student, Faculty, or Regular.</li>
            <li>Each membership type can have different privileges (e.g., borrowing limits, time periods, etc.).</li>
            <li>Members must provide identification when checking out or returning books.</li>
       </ul>

      <h2>Book Reservation Rules</h2>
        <ul>
            <li>If a book is checked out, members can reserve it, and the system will notify them once it's available.</li>
            <li>Books can be reserved only for a certain period (e.g., 3 days), after which the reservation expires.</li>
            <li>Reserved books should be held aside and made available within the specified period.</li>
        </ul>

        <h2>Fine Rules</h2>
        <ul>
            <li>Late fees should be calculated per day (e.g., $1 per day per book).</li>
            <li>Fees should be paid before users can check out or reserve books.</li>
            <li>Fines can be waived for specific reasons (e.g., system error, severe weather conditions).</li>
        </ul>


         <h2>Inventory and Stock Management Rules</h2>
        <ul>
            <li>Each book must be uniquely identified by a barcode or ID.</li>
            <li>Books should be categorized by genres, authors, and publishers.</li>
            <li>The system should track the number of copies available for each book.</li>
            <li>The system should send automatic reminders to staff when book stock is low or when books are lost/damaged.</li>
        </ul>
        
        <h2>Lost or Damaged Book Rules</h2>
        <ul>
            <li>If a book is lost or damaged by a user, the user may be required to pay for a replacement copy.</li>
            <li>The system should allow staff to mark books as lost or damaged and track the status.</li>
        </ul>

        <h2>Admin and Staff Rules</h2>
        <ul>
            <li>Admins have full access to manage the system, including adding/removing books, modifying user accounts, and generating reports.</li>
            <li>Staff can check out/in books, issue fines, and assist with inventory management.</li>
            <li>Admins can generate reports for daily, monthly, or yearly book circulation and user activity.</li>
        </ul>

    </div>
</body>
