<?php
session_start();
$user = $_SESSION['user'] ?? null; // Get the logged-in user from the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TradeX</title>
    <link href="./res/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<header>
    <h1>TradeX</h1>
    <nav>
        <a href="dashboard.php">Dashboard</a> |
        <a href="items.php">My Items</a> |
        <a href="propose_trade.php">Propose Trade</a> |
        <a href="trades.php">Trade Offers</a> |
        <?php if ($user): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </nav>
</header>
<main>
    <h2>Welcome to TradeX!</h2>
    <p>Your one-stop platform for trading items with others.</p>
    <!-- Additional content can go here -->
</main>
<footer>
    <p>&copy; <?= date("Y") ?> TradeX. All rights reserved.</p>
</footer>
</body>
</html>
