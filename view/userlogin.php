<!DOCTYPE html>
<html>
<head>
    <title>User Signup</title>
</head>
<body>

    <h2>User Signup</h2>

    <form action="abcd.php" method="POST">
        <table>
            <tr>
                <td><label for="fullname">Full Name:</label></td>
                <td><input type="text" id="fullname" name="fullname" ></td>
            </tr>

            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" ></td>
            </tr>

            <tr>
                <td><label for="phone">Phone Number:</label></td>
                <td><input type="tel" id="phone" name="phone" pattern="[0-9]{10,15}" placeholder="Enter phone number" ></td>
            </tr>

            <tr>
                <td><label for="dob">Date of Birth:</label></td>
                <td><input type="date" id="dob" name="dob" ></td>
            </tr>

            <tr>
                <td><label for="gender">Gender:</label></td>
                <td>
                    <input type="radio" id="male" name="gender" value="Male" > Male
                    <input type="radio" id="female" name="gender" value="Female" > Female
                    <input type="radio" id="other" name="gender" value="Other" > Other
                </td>
            </tr>

            <tr>
                <td><label for="address">Address:</label></td>
                <td><textarea id="address" name="address" rows="3" ></textarea></td>
            </tr>

            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id="username" name="username" ></td>
            </tr>

            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" ></td>
            </tr>

            <tr>
                <td><label for="confirm_password">Confirm Password:</label></td>
                <td><input type="password" id="confirm_password" name="confirm_password" ></td>
            </tr>

            <tr>
                <td><label for="profile_picture">Profile Picture:</label></td>
                <td><input type="file" id="profile_picture" name="profile_picture"></td>
            </tr>

            <tr>
                <td><label for="newsletter">“By checking this box you are <br> agreeing to our terms of service.”:</label></td>
                <td><input type="checkbox" id="newsletter" name="newsletter" value="Yes"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Sign Up"></td>
            </tr>
        </table>
    </form>

</body>
</html>
