<?php
$adminNameErr = $adminEmailErr = $adminPasswordErr = $reportDateErr = $adminImageErr = "";
$admin_name = $admin_email = $admin_password = $metro_line = $report_date = $uploadedImagePath = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Admin Name
    if (empty($_POST["admin_name"])) {
        $adminNameErr = "Admin name is required";
    } else {
        $admin_name = test_input($_POST["admin_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $admin_name)) {
            $adminNameErr = "Only letters and white space allowed";
        }
    }

    // Admin Email
    if (empty($_POST["admin_email"])) {
        $adminEmailErr = "Admin email is required";
    } else {
        $admin_email = test_input($_POST["admin_email"]);
        if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
            $adminEmailErr = "Invalid email format";
        }
    }

    // Password
    if (empty($_POST["admin_password"])) {
        $adminPasswordErr = "Password is required";
    } else {
        $admin_password = test_input($_POST["admin_password"]);
        if (strlen($admin_password) < 6) {
            $adminPasswordErr = "Password must be at least 6 characters";
        }
    }

    // Metro Line
    $metro_line = isset($_POST["metro_line"]) ? test_input($_POST["metro_line"]) : "";

    // Report Date
    if (empty($_POST["report_date"])) {
        $reportDateErr = "Report date is required";
    } else {
        $report_date = test_input($_POST["report_date"]);
    }

    // Image Upload
    $target_dir = "uploads/";
    $uploadOk = 1;
    $uploadedImagePath = "";

    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate image file
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check === false) {
            $adminImageErr = "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $adminImageErr = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // File size
        if ($_FILES["fileToUpload"]["size"] > 2 * 1024 * 1024) {
            $adminImageErr = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // File type
        $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];
        if (!in_array($imageFileType, $allowedTypes)) {
            $adminImageErr = "Only JPG, JPEG, PNG, GIF & WEBP files are allowed.";
            $uploadOk = 0;
        }

        // Upload
        if ($uploadOk == 1) {
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $uploadedImagePath = $target_file;
            } else {
                $adminImageErr = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $adminImageErr = "Profile picture is required.";
    }
}
?>
