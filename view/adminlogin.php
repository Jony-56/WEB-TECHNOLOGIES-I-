<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_style.css">  
</head>
<body>

    <?php include("submit_admin.php"); ?>

    <h2 class="headertxt">Metro Rail Management - Admin Form</h2>

    <form id="form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
        <label for="admin_name">Admin Name:</label>
        <input type="text" id="admin_name" name="admin_name" value="<?php echo $admin_name; ?>">
        <span class="error">* <?php echo $adminNameErr; ?></span>
        <br><br>

        <label for="admin_email">Admin Email:</label>
        <input type="email" id="admin_email" name="admin_email" value="<?php echo $admin_email; ?>">
        <span class="error">* <?php echo $adminEmailErr; ?></span>
        <br><br>

        <label for="admin_password">Admin Password:</label>
        <input type="password" id="admin_password" name="admin_password" value="<?php echo $admin_password; ?>">
        <span class="error">* <?php echo $adminPasswordErr; ?></span>
        <br><br>

        <label for="metro_line">Select Metro Line:</label>
        <select id="metro_line" name="metro_line">
            <option value="line1" <?php if ($metro_line == "line1") echo "selected"; ?>>Line 1</option>
            <option value="line2" <?php if ($metro_line == "line2") echo "selected"; ?>>Line 2</option>
            <option value="line3" <?php if ($metro_line == "line3") echo "selected"; ?>>Line 3</option>
            <option value="line4" <?php if ($metro_line == "line4") echo "selected"; ?>>Line 4</option>
        </select>
        <br><br>

        <label for="report_date">Report Date:</label>
        <input type="date" id="report_date" name="report_date" value="<?php echo $report_date; ?>">
        <span class="error">* <?php echo $reportDateErr; ?></span>
        <br><br>

        <label for="fileToUpload">Upload Profile Picture:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <span class="error">* <?php echo $adminImageErr; ?></span>
        <br><br>

        <button type="submit">Submit</button>
    </form>

     <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $adminNameErr == "" && $adminEmailErr == "" && $adminPasswordErr == "" && $reportDateErr == "" && $adminImageErr == "") {
        echo "<h3>Form Submitted Successfully!</h3>";
        echo "<strong>Name:</strong> $admin_name <br>";
        echo "<strong>Email:</strong> $admin_email <br>";
        echo "<strong>Password:</strong> " . str_repeat("*", strlen($admin_password)) . " <br>";
        echo "<strong>Metro Line:</strong> $metro_line <br>";
        echo "<strong>Report Date:</strong> $report_date <br>";
        echo "<strong>Uploaded Image:</strong><br><img src='$uploadedImagePath' alt='Admin Image' style='max-width:200px; border-radius:8px;'>";
    }
    ?>

</body>
</html>