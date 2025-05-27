<?php
function GetConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "metro_admin";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function InsertAdmin($conn, $name, $email, $hashed_password, $metro_line, $report_date, $profile_image) {
   
   
    $sql = "INSERT INTO admins (`name`, `email`, `password`, `metro_line`, `report_date`, `profile_image`) 
            VALUES ('$name', '$email', '$hashed_password', '$metro_line', '$report_date', '$profile_image')";

    return mysqli_query($conn, $sql);
}

function validAdmin($conn, $email, $password) {
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM admins WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $admin = mysqli_fetch_assoc($result);
        if ($password === $admin['password']) { // plain password match
            return $admin;
        }
    }
    return false;
}


?>
