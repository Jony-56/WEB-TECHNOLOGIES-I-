<?php
include "../Model/db_connect.php";

$conn = GetConnection();

$adminNameErr = $adminEmailErr = $adminPasswordErr = $reportDateErr = $adminImageErr = "";
$admin_name = $admin_email = $admin_password = $metro_line = $report_date = $target_file = "";

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["admin_name"])) {
        $adminNameErr = "Admin name is required";
    } else {
        $admin_name = test_input($_POST["admin_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $admin_name)) {
            $adminNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["admin_email"])) {
        $adminEmailErr = "Email is required";
    } else {
        $admin_email = test_input($_POST["admin_email"]);
        if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
            $adminEmailErr = "Invalid email format";
        }
    }

    if (empty($_POST["admin_password"])) {
        $adminPasswordErr = "Password is required";
    } else {
        $admin_password = test_input($_POST["admin_password"]);
        if (strlen($admin_password) < 6) {
            $adminPasswordErr = "Password must be at least 6 characters";
        }
    }

    $metro_line = test_input($_POST["metro_line"]);
    $report_date = test_input($_POST["report_date"]);

    $uploadOk = 1;
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!empty($_FILES["fileToUpload"]["tmp_name"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check === false) {
            $adminImageErr = "Not a valid image.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            $adminImageErr = "Image already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 2 * 1024 * 1024) {
            $adminImageErr = "Image too large.";
            $uploadOk = 0;
        }

        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif", "webp"])) {
            $adminImageErr = "Only image files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk && !is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        if ($uploadOk && !move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $adminImageErr = "Image upload failed.";
            $uploadOk = 0;
        }
    }

    if (empty($adminNameErr) && empty($adminEmailErr) && empty($adminPasswordErr) && empty($reportDateErr) && empty($adminImageErr)) {
        // Save plain password (not secure)
        $plain_password = $admin_password;

        $insert = InsertAdmin($conn, $admin_name, $admin_email, $plain_password, $metro_line, $report_date, $target_file);

        if ($insert) {
            header("Location: ../view/admin_login.php");
            exit();
        } else {
            echo "<p style='color:red;'>Insert failed: " . mysqli_error($conn) . "</p>";
        }
    }

    mysqli_close($conn);
}
?>
