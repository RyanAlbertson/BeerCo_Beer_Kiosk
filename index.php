<?php
// Reference: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

require_once "resources/data/config.php";
$username = "";
$password = "";
$confirmPassword = "";
$usernameErrMsg = "";
$passwordErrMsg = "";
$confirmPasswordErrMsg = "";

if (isset($_POST['task'])) {

  // sign in functionality
  if ($_POST['task'] == 'Sign In') {
    // Redirect user to home page if already logged in
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
      header("location: home/home.php");
      exit;
    }

    // Process the login form
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Check that user has entered an email
      if(!empty(trim($_POST["username"]))) {
        $username = trim($_POST["username"]);
      }
      // Check that user has entered a password
      if(!empty(trim($_POST["password"]))) {
        $password = trim($_POST["password"]);
      }
      // Validate username & password
      if(empty($usernameErrMsg) && empty($passwordErrMsg)) {
        $query = "SELECT id, email, password FROM members WHERE email = ?";
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
                  header("location: home/home.php");
                } else {
                    $passwordErrMsg = "Invalid password.";
                }
              }
            } else {
                $usernameErMsg = "Username does not exist.";
            }
          } else {
            echo "We could not log you in. Please try again later.";
          }
        mysqli_stmt_close($stmt);
        }
      }
      mysqli_close($link);
    }

  // sign up functionality
  } else if ($_POST['task'] == 'Sign Up') {

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Check if user has entered an email
      if(!empty(trim($_POST["username"]))) {
        $query = "SELECT id FROM members WHERE email = ?";
        if($stmt = mysqli_prepare($link, $query)) {
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          $param_username = trim($_POST["username"]);
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1) {
              $usernameErrMsg = "This email is already in use.";
            } else {
                // Save email for pending database insert
                $username = trim($_POST["username"]);
            }
          } else {
              echo "Something went wrong. Please try again later.";
          }
          mysqli_stmt_close($stmt);
        }
      }

      // Validate password, if user has entered one
      if(!empty(trim($_POST["password"]))) {
        $password = trim($_POST["password"]);
      }

      // Validate confirm password
      if(!empty(trim($_POST["confirm_password"]))) {
        $confirmPassword = trim($_POST["confirm_password"]);
        if(empty($passwordErrMsg) && ($password != $confirmPassword)) {
            $confirmPasswordErrMsg = "Password do not match.";
        }
      }

      // Check that fields are valid before database insertion
      if(empty($usernameErrMsg) && empty($passwordErrMsg) && empty($confirmPasswordErrMsg)) {
        $query = "INSERT INTO members (email, password) VALUES (?, ?)";
        if($stmt = mysqli_prepare($link, $query)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            $param_username = $username;
            // Hash the password for security
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                // Redirect to home page
                header("location: home/home.php");
            } else {
                echo "We could not make your account. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
      }
      mysqli_close($link);
    }
  }
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
    <!-- entire page container -->
    <div class="container" id="container">
      <!-- sign up container -->
      <div class="form-container sign-up-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <h1>Create Account</h1>
          <span>Use Your Email For Registration</span>
          <!-- email -->
          <div class="form-group <?php echo (!empty($usernameErrMsg))?'has-error':'';?>">
            <input type="text" name="username" placeholder="Email" class="form-control"
            value="<?php echo $username;?>">
            <span class="help-block"><?php echo $usernameErrMsg;?></span>
          </div>
          <!-- password -->
          <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control"
            value="<?php echo $password;?>">
          </div>
          <!-- confirm password -->
          <div class="form-group <?php echo (!empty($confirmPasswordErrMsg))?'has-error':'';?>">
            <input type="password" name="confirm_password" placeholder="Confirm Password"
            class="form-control" value="<?php echo $confirmPassword;?>">
            <span class="help-block"><?php echo $confirmPasswordErrMsg;?></span>
          </div>
          <!-- sign up button -->
          <div class="form-group">
            <button type="submit" name="task" value="Sign Up">Sign Up</button>
          </div>
        </form>
      </div>
      <!-- sign in container -->
      <div class="form-container sign-in-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <h1>Sign In</h1>
            <div class="social-container">
              <!-- social media icons -->
              <a href="https://facebook.com" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="https://linkedin.com" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your Account</span>
          <!-- email -->
          <div
           class="form-group <?php echo (!empty($usernameErrMsg))?'has-error':'';?>">
            <input type="text" name="username" placeholder="Email" class="form-control"
            value="<?php echo $username;?>" required>
            <span class="help-block"><?php echo $usernameErrMsg; ?></span>
          </div>
          <!-- password -->
          <div class="form-group <?php echo (!empty($passwordErrMsg))?'has-error':'';?>">
            <input type="password" name="password" placeholder="Password" class="form-control">
            <span class="help-block"><?php echo $passwordErrMsg; ?></span>
          </div>
          <!-- sign in button -->
          <div class="form-group">
            <button type="submit" name="task" value="Sign In">Sign In</button>
          </div>
        </form>
      </div>
      <!-- Overlay functionality container -->
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
    </div>
    <script src="resources/js/index.js"></script>
  </body>
</html>