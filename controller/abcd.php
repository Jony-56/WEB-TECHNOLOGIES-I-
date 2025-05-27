<?php
include "../Model/db_connect.php";

$profilePicErr = $nameErr = $emailErr = $phoneErr = $dateErr = $genderErr = $addErr = $userErr = $passErr = $confirmpassErr = $chkboxErr = "";
$uploadOk = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $isValid = true;

    if (empty($_POST["fullname"])) {
        $nameErr = "Full Name is required";  
        $isValid = false;
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } 

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $isValid = false;
    }

    if (empty($_POST["dob"])) {
        $dateErr = "Date of Birth is required";
        $isValid = false;
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $isValid = false;
    }

    if (empty($_POST["address"])) {
        $addErr = "Address is required";
        $isValid = false;
    }

    if (empty($_POST["username"])) {
        $userErr = "Username is required";
        $isValid = false;
    }

    if (empty($_POST["password"])) {
        $passErr = "Password is required";
        $isValid = false;
    }

    if (empty($_POST["confirm_password"])) {
        $confirmpassErr = "Confirm Password is required";
        $isValid = false;
    } elseif ($_POST["password"] !== $_POST["confirm_password"]) {
        $confirmpassErr = "Passwords do not match";
        $isValid = false;
    }

    if (!isset($_POST["newsletter"])) {
        $chkboxErr = "You must agree to the terms";
        $isValid = false;
    }

    $target_file = "";

    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["name"] != "") {
        $target_dir = "uploads/";
        $imageFileType = strtolower(pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION));
        $username = $_POST["username"];
        $target_file = $target_dir . $username . "." . $imageFileType;

        $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
        if ($check === false) {
            $profilePicErr = "File is not a valid image.";
            $uploadOk = 0;
            $isValid = false;
        }

        if ($_FILES["profile_picture"]["size"] > 500000) {
            $profilePicErr = "File is too large. Max size is 500KB.";
            $uploadOk = 0;
            $isValid = false;
        }

        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            $profilePicErr = "Only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            $isValid = false;
        }

        if ($uploadOk == 1) {
            if (!file_exists("uploads")) {
                mkdir("uploads", 0777, true);
            }

            if (!move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                $profilePicErr = "There was an error uploading your file.";
                $isValid = false;
            }
        }
    }

    if ($isValid) {
        $con = GetConnection();

        // You must define this function in db_connect.php
        $result = InsertData(
            $con,
            $_POST["fullname"],
            $_POST["email"],
            $_POST["phone"],
            $_POST["dob"],
            $_POST["gender"],
            $_POST["address"],
            $_POST["username"],
            $_POST["password"],
            $target_file // Pass file path
        );

       if ($result) {
    header("Location: login.php");
    exit();


        } else {
            echo "Failed to register user.";
        }
    }
}
?>
