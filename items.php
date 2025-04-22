<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    echo "<p style='color: red;'>You must be logged in to view your items.</p>";
    echo '<a href="login.php">Login</a>';
    exit();
}

$user = $_SESSION['user'];
$items = $_SESSION['items'][$user] ?? [];

// Start HTML output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        .item {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .no-items {
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>

<h2>Your Items</h2>

<?php if (empty($items)): ?>
    <p class="no-items">You have no items.</p>
<?php else: ?>
    <?php foreach ($items as $item): ?>
        <div class="item"><?= htmlspecialchars($item) ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<a class="back-link" href="dashboard.php">Back to Dashboard</a>

</body>
</html>
