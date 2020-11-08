<?php
session_start();

// Send user to login page if they're not logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ".dirname(__FILE__, 2)."index.php");
    exit;
}
?>