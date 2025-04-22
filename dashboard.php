<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

// Start HTML output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        .nav-links {
            margin: 20px 0;
        }
        .nav-links a {
            text-decoration: none;
            color: #007bff;
            margin-right: 15px;
            font-weight: bold;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        .logout {
            color: red;
        }
    </style>
</head>
<body>

<h2>Welcome, <?= htmlspecialchars($user) ?>!</h2>

<div class="nav-links">
    <a href="items.php">My Items</a>
    <a href="propose_trade.php">Propose Trade</a>
    <a href="trades.php">Trade Offers</a>
    <a class="logout" href="logout.php">Logout</a>
</div>

</body>
</html>
