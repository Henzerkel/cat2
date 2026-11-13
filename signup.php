<?php
require 'db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("INSERT INTO users (username,email,full_name,password) VALUES (?,?,?,?)");
  try {
    $stmt->execute([$_POST['username'], $_POST['email'], $_POST['full_name'], password_hash($_POST['password'], PASSWORD_DEFAULT)]);
    $msg = "Registered successfully!";
  } catch (PDOException $e) { $msg = "Error: username already exists."; }
}
?>
<h2>Sign up</h2><p><?= htmlspecialchars($msg) ?></p>
<form method="POST">
  <input name="username" placeholder="Username" required><br>
  <input name="full_name" placeholder="Full name"><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button>Register</button>
</form>
<a href="login.php">Login</a> | <a href="feedback.php">Feedback</a>
