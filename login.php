<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Dummy login
    if ($user === 'ipin' || $user === 'opin') {
        $_SESSION['user'] = $user;
        if (!isset($_SESSION['items'])) {
            $_SESSION['items'] = [
                'ipi' => ['Book', 'Hat'],
                'opin' => ['Backpack', 'Shoes']
            ];
        }
        $_SESSION['trades'] = $_SESSION['trades'] ?? [];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "User not found.";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Username (ipin or opin): <input type="text" name="username" required>
    <button type="submit">Login</button>
</form>
