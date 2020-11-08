<?php
session_start();

// Send user to login page if they're not logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ".dirname(__FILE__, 2)."index.php");
    exit;
}
?>

<!-- DOCTYPE html -->
<html>
  <head>
    <title>Welcome to BeerCo</title>
    <link rel="stylesheet" href="../resources/css/404.css" media="Screen" type="text/css"/>
  </head>
  <body>
    <div>
      <h1>Welcome to the BeerCo Beer Kiosk</h1>
      <form>
        <input type="button" value="Return to previous page" onclick="history.back()">
      </form>
    </div>
  </body>
</html>