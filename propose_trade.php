<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    echo "You must be logged in to propose a trade.";
    exit();
}

$user = $_SESSION['user'];
$otherUser  = $user === 'ipin' ? 'bob' : 'opin';
$myItems = $_SESSION['items'][$user] ?? [];
$theirItems = $_SESSION['items'][$otherUser ] ?? [];

// Handle trade proposal
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $offer = $_POST['offer_item'] ?? '';
    $want = $_POST['want_item'] ?? '';

    // Validate the selected items
    if (!in_array($offer, $myItems) || !in_array($want, $theirItems)) {
        echo "<p style='color: red;'>Invalid trade proposal. Please select valid items.</p>";
    } else {
        $_SESSION['trades'][] = [
            'from' => $user,
            'to' => $otherUser ,
            'offer' => $offer,
            'want' => $want
        ];
        echo "<p style='color: green;'>Trade proposed successfully!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propose a Trade</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        select, button {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            max-width: 300px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Propose a Trade</h2>
<form method="POST">
    <label for="offer_item">Your Item:</label>
    <select name="offer_item" id="offer_item" required>
        <option value="">Select an item</option>
        <?php foreach ($myItems as $item): ?>
            <option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="want_item">Want Their Item:</label>
    <select name="want_item" id="want_item" required>
        <option value="">Select an item</option>
        <?php foreach ($theirItems as $item): ?>
            <option value="<?= htmlspecialchars($item) ?>"><?= htmlspecialchars($item) ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Propose Trade</button>
</form>

<a class="back-link" href="dashboard.php">Back to Dashboard</a>

</body>
</html>
