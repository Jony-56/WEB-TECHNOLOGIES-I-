<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
<h2 class="headertxt">Admin Login</h2>

<?php
if (isset($_SESSION['login_error'])) {
    echo "<p style='color:red;'>" . $_SESSION['login_error'] . "</p>";
    unset($_SESSION['login_error']);
}
?>

<form method="post" action="../controller/admin_loginC.php" id="form">
    <label for="admin_email">Email:</label>
    <input type="email" name="admin_email" required>

    <label for="admin_password">Password:</label>
    <input type="password" name="admin_password" required>

    <button type="submit">Login</button>
</form>
</body>
</html>
