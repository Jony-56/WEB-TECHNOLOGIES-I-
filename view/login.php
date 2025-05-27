<!-- login.php -->
<?php
include "../controller/loginControl.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Simple Login Form</title>
  <link rel="stylesheet" href="logStyle.css" />
  <style>
     .error{
        color: red;
    }
  </style>
</head>
<body>

  <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <div class="form-group">
      <label for="username">User Name</label>
      <input type="text" id="username" name="username" class="form-control" />
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control" />
    </div>

    <div class="row">
      <div class="col">
        <label><input type="checkbox" checked /> Remember me</label>
      </div>
      <div class="col text-right">
        <a href="#">Forgot password?</a>
      </div>
    </div>

    <button type="submit" class="btn">LogIn</button><br>
    <span class= "error "> <?php echo $invalid ?></span>
    

    <div class="text-center">
      <p>Not a member? <a href="userlogin.php">Register</a></p>
    </div>
  </form>

</body>
</html>
