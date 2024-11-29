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
        <li>Bookd should be returned on time to avoid fines</li>
        <li>If a book is returned late, the overdue fine will be calculated based on the number of days it was overdue</li>
        <li>Members can renew books if no other member has reserved the book</li>
        <li>Book can be returned to the library directly</li>
      
      <h2>Membeship Rules</h2>
        <li>Users need to sign up with valid credentials (name, address, contact info, etc.)</li>
        <li>Users must be approved by the library staff</li>
        <li>Users are assigned</li>
        <li></li>
        <li></li>

      <h2>Book Reservation Rules</h2>
  
    </body>
