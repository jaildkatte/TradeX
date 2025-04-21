<?php
session_start();
$user = $_SESSION['user'];
$trades = $_SESSION['trades'];
$incoming = array_filter($trades, fn($t) => $t['to'] === $user);
?>

<h2>Incoming Trade Offers</h2>
<?php if (empty($incoming)): ?>
    <p>No trade offers.</p>
<?php else: ?>
    <ul>
    <?php foreach ($incoming as $index => $trade): ?>
        <li>
            <?= $trade['from'] ?> offers <strong><?= $trade['offer'] ?></strong> for your <strong><?= $trade['want'] ?></strong>
            <form method="POST" action="accept_trade.php" style="display:inline;">
                <input type="hidden" name="index" value="<?= $index ?>">
                <button type="submit">Accept</button>
            </form>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
<br><a href="dashboard.php">Back</a>
