<?php
session_start();

// Destroy all session data
session_destroy();

// Expire cookies by setting their expiration time in the past
setcookie("admin_id", "", time() - 3600, "/");
setcookie("admin_name", "", time() - 3600, "/");

// Redirect to login page
header("Location: ../view/admin_login.php");
exit();
?>
