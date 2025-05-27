<?php
session_start();
include "../Model/db_connect.php";

$conn = GetConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize email and password
    $email = filter_var(trim($_POST["admin_email"]), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["admin_password"]);

    // Basic validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['login_error'] = "Invalid email format.";
        header("Location: ../view/admin_login.php");
        exit();
    }

    if (empty($password)) {
        $_SESSION['login_error'] = "Password is required.";
        header("Location: ../view/admin_login.php");
        exit();
    }

    // Attempt login
    $admin = validAdmin($conn, $email, $password);

    if ($admin) {
        $_SESSION["admin_id"] = $admin["id"];
        $_SESSION["admin_name"] = $admin["name"];

        // Set cookies for 7 days
        setcookie("admin_id", $admin["id"], time() + (7 * 24 * 60 * 60), "/");
        setcookie("admin_name", $admin["name"], time() + (7 * 24 * 60 * 60), "/");

        header("Location: ../view/admin_dashboard.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid credentials.";
        header("Location: ../view/admin_login.php");
        exit();
    }

    mysqli_close($conn);
}
?>
