<?php
require 'db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
  $stmt->execute([$_POST['username']]);
  $u = $stmt->fetch(PDO::FETCH_ASSOC);
  $msg = ($u && password_verify($_POST['password'], $u['password'])) ? "Login successful. Welcome, " . $u['username'] . "!" : "Invalid username or password.";
}
?>
<h2>Login</h2><p><?= htmlspecialchars($msg) ?></p>
<form method="POST">
  <input name="username" placeholder="Username" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button>Login</button>
</form>
<a href="signup.php">Sign up</a>
