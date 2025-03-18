

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_style.css">  <!-- Linking the external CSS file -->
</head>

<body>

    <h2>Metro Rail Management - Admin Form</h2>

    <form action="submit_admin.php" method="post">
        <!-- Admin Name -->
        <label for="admin_name">Admin Name:</label>
        <input type="text" id="admin_name" name="admin_name" required>
        <br><br>

        <!-- Admin Email -->
        <label for="admin_email">Admin Email:</label>
        <input type="email" id="admin_email" name="admin_email" required>
        <br><br>

        <!-- Admin Password -->
        <label for="admin_password">Admin Password:</label>
        <input type="password" id="admin_password" name="admin_password" required>
        <br><br>

        <!-- Metro Line Selection -->
        <label for="metro_line">Select Metro Line:</label>
        <select id="metro_line" name="metro_line" required>
            <option value="line1">Line 1</option>
            <option value="line2">Line 2</option>
            <option value="line3">Line 3</option>
            <option value="line4">Line 4</option>
        </select>
        <br><br>

        <!-- Report Date -->
        <label for="report_date">Report Date:</label>
        <input type="date" id="report_date" name="report_date" required>
        <br><br>

        <!-- Submit Button -->
        <button type="submit">Submit</button>
    </form>
    

</body>
</html>
