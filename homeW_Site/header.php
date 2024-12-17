<?php
session_start();
?>

<form action="login_handler.php" method="POST">
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Submit</button>
</form>

<?php if (isset($_SESSION['registered_user'])): ?>
    <p>Welcome, <?= htmlspecialchars($_SESSION['registered_user']); ?>!</p>
<?php endif; ?>

<?php if (isset($_SESSION['registered_user'])): ?>
    <a href="logout.php">Logout</a>
<?php endif; ?>

