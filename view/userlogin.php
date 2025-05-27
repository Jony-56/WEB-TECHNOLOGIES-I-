<?php
// Include controller logic first
include "../controller/abcd.php";
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .error{
    color: #FF0000;
}

    </style>
    <title>User Signup</title>
    <link rel="stylesheet" href="userlogin.css">
</head>
<body>

<div class="main-container">

    <h2 class="htext">User Signup</h2>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">

        <table>

            <tr>
                <td colspan="2" style="text-align: center;">
                    <img id="signup-img" src="images/20-203381_sign-up-icon-png-login-and-signup-icon.png" alt="">
                </td>
            </tr>

            <tr>
                <td><label for="fullname">Full Name:</label></td>
                <td>
                    <input type="text" id="fullname" name="fullname">
                    <span class="error"><?php echo $nameErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="email">Email:</label></td>
                <td>
                    <input type="email" id="email" name="email">
                    <span class="error"><?php echo $emailErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="phone">Phone Number:</label></td>
                <td>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{10,15}" placeholder="Enter phone number">
                    <span class="error"><?php echo $phoneErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="dob">Date of Birth:</label></td>
                <td>
                    <input type="date" id="dob" name="dob">
                    <span class="error"><?php echo $dateErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="gender">Gender:</label></td>
                <td>
                    <label class="gender-option">
                        <input type="radio" id="male" name="gender" value="Male"> Male
                    </label>
                    <label class="gender-option">
                        <input type="radio" id="female" name="gender" value="Female"> Female
                    </label>
                    <label class="gender-option">
                        <input type="radio" id="other" name="gender" value="Other"> Other
                    </label>
                    <span class="error"><?php echo $genderErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="address">Address:</label></td>
                <td>
                    <textarea id="address" name="address" rows="3"></textarea>
                    <span class="error"><?php echo $addErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="username">Username:</label></td>
                <td>
                    <input type="text" id="username" name="username">
                    <span class="error"><?php echo $userErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="password">Password:</label></td>
                <td>
                    <input type="password" id="password" name="password">
                    <span class="error"><?php echo $passErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="confirm_password">Confirm Password:</label></td>
                <td>
                    <input type="password" id="confirm_password" name="confirm_password">
                    <span class="error"><?php echo $confirmpassErr; ?></span>
                </td>
            </tr>
<tr>
    <td><label for="profile_picture">Profile Picture:</label></td>
    <td>
        <input type="file" id="profile_picture" name="profile_picture">
        <span class="error"><?php echo $profilePicErr; ?></span>
    </td>
</tr>

            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox" id="newsletter" name="newsletter" value="Yes">
                        By checking this box you are agreeing to our terms of service.
                    </label>
                    <span class="error"><?php echo $chkboxErr; ?></span>
                </td>
            </tr>

            <tr>
                <td></td>
                <td><input class="btn" type="submit" value="Sign Up"></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
