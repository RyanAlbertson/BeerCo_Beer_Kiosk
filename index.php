<?php
// Reference: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

session_start();

// Redirect user to home page if already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: home.php");
  exit;
}

require_once "resources/data/config.php";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/fc0bcca8a3.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="resources/css/index.css">
        <title>Welcome to BeerCo!</title>
    </head>
    <body>
        <div class="form-container sign-in-container">
            <!-- sign in container -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1>Sign In</h1>
                    <div class="social-container">
                        <!-- let's create 2 social icon: facebook, & linked-in... -->
                        <a href="https://facebook.com" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://linkedin.com" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your Account</span>
                <!-- username container -->
                <div class="form-group <?php echo (!empty($usernameErrMsg))?'has-error':'';?>">
                    <h1>Create Account</h1>
                    <span>Use Your Email For Registration</span>
                    <input type="text" name="username"placeholder="Email" class="form-control" value="<?php echo $username;?>" required>
                    <span class="help-block"><?php echo $usernameErrMsg; ?></span>
                </div>
                <!-- password container -->
                <div class="form-group <?php echo (!empty($passwordErrMsg))?'has-error':'';?>">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <span class="help-block"><?php echo $passwordErrMsg; ?></span>
                </div>
                <!-- login button -->
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Sign In">
                </div>
            </form>
        </div>
        <!-- Overlay container -->
        <div class="overlay-container">
            <!-- another container -->
            <div class="overlay">
                <!-- another container -->
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details and start the journey with us</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello Friend!</h1>
                    <p>To stay connected please login with your personal account</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
        <script src="resources/js/main.js"></script>
    </body>
</html>