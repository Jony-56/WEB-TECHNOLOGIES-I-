<?php
session_start();
include "../Model/db_connect.php";

$invalid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $conn = GetConnection();
        $user = validUser($conn, $username, $password);

        if ($user) {
            $_SESSION["username"] = $user["Username"];
            setcookie("username", $user["Username"], time() + 3600, "/");
            header("Location: dashboard.php");
            exit();
        } else {
            $invalid = "Invalid username or password.";
        }
    } else {
        $invalid = "Username and password are required.";
    }
}
?>
