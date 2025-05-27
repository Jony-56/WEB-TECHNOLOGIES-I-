<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
    header("Location: adminlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION["admin_name"]; ?></h2>
    <a href="../controller/logout.php">Logout</a>
</body>
</html>
