<?php
function GetConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "metro_management";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function InsertData($conn, $fullname, $email, $phone, $dob, $gender, $address, $username, $password, $file) {
    $sql = "INSERT INTO `userinfo` 
           (`Full Name:`, `Email`, `Phone Number`, `Date of Birth`, `Gender`, `Address`, `Username`, `Password`, `Profile Picture`) 
           VALUES 
           ('$fullname', '$email', '$phone', '$dob', '$gender', '$address', '$username', '$password', '$file')";

    return mysqli_query($conn, $sql);
}

function validUser($conn, $username, $password) {
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $sql = "SELECT * FROM userinfo WHERE `Username` = '$username' AND `Password` = '$password'";
    $result = mysqli_query($conn, $sql);
    return ($result && mysqli_num_rows($result) == 1) ? mysqli_fetch_assoc($result) : false;
}
?>
