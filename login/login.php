<?php
// Reference: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

session_start();

// Redirect user to home page if already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: home.php");
  exit;
}

require_once "../resources/data/config.php";

$username = "";
$password = "";
$usernameErrMsg = "";
$passwordErrMsg = "";

// Process the login form
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // If user hasn't entered username
  if(empty(trim($_POST["username"]))){
    $usernameErrMsg = "Please enter username.";
  } else{
    $username = trim($_POST["username"]);
  }
  // If user hasn't entered password
  if(empty(trim($_POST["password"]))){
    $passwordErrMsg = "Please enter your password.";
  } else{
    $password = trim($_POST["password"]);
  }

  // Validate username & password
  if(empty($usernameErrMsg) && empty($passwordErrMsg)) {
    $query = "SELECT id, username, password FROM users WHERE username = ?";
    if($stmt = mysqli_prepare($link, $query)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      $param_username = $username;
      // Attempt to execute and store the prepared statement
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        // If username exists, then validate password
        if(mysqli_stmt_num_rows($stmt) == 1 ) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if(mysqli_stmt_fetch($stmt)) {
            if(password_verify($password, $hashed_password)) {
              session_start();
              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
              // Redirect user to home page
              header("location: home.php");
            } else {
                $passwordErrMsg = "Invalid password.";
            }
          }
        } else {
            $usernameErMsg = "Username does not exist.";
        }
      } else {
        echo "ERROR: SQL statement did not execute correctly.";
      }
    mysqli_stmt_close($stmt);
    }
  }
  mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

  <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
  </style>

</head>
<body>
  <div class="wrapper">
    <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($usernameErrMsg)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $usernameErrMsg; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($passwordErrMsg)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $passwordErrMsg; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>