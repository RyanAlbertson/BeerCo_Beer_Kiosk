<?php
// Searches DB for the typed letters from the search bar in home.php

// Connect to DB
require_once "../resources/data/config.php";
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn->connect_error) {
    die("ERROR: failed to connect to MySQL: " . $conn->connect_error);
}

// Search DB for matching brand names
if (isset($_GET['term'])) {
    $query = "SELECT * FROM product_data WHERE Brand_Name LIKE '{$_GET['term']}' LIMIT 20";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $res[] = $row['Brand_Name'];
        }
    } else {
      $res = array();
    }
    echo json_encode($res);
}
?>