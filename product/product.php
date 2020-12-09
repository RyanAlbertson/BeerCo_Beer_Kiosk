<?php
session_start();
// Send user to login page if they're not logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: ".dirname(__FILE__, 2)."../index.php");
    exit;
}

// Get this beer's productId and image file path from home page
$productInfo = explode("|", $_POST["productId_&_imgFilePath"]);
$productId = $productInfo[0];
$productImgPath = $productInfo[1];

// Get this beer's data from DB
require_once("../resources/data/config.php");
$table = "product_data";
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$query = "SELECT * FROM product_data WHERE product_id LIKE ".$productId."";
$result = mysqli_query($conn, $query);
if(!$result){
    header("location: ../404.html");
    exit;
    // die('ERROR: SQL query failed');
}
$row = mysqli_fetch_array($result);

$brandName = $row['Brand_Name'];
$beerStyle = $row['Primary_Beer_Style'];
$abv = $row['ABV'];
$ibu = $row['IBU'];
$description = $row['Specific_Beer_Style_Description'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/css/ProductsPageStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title> <?php echo $brandName; ?> | Beer Co.</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="shoeBackground" style="">
                <div class="gradient second" color="blue"></div>
                <h1 class="nike">Beer Co.</h1>
                <img src="<?php echo $productImgPath; ?>" style="display:block; margin-left:auto; margin-right:auto; vertical-align:middle;" class="shoe show"/>
            </div>
            <div class="info">
                <div class="shoeName">
                    <div>
                        <h1 class="big"><?php echo $brandName; ?></h1>
                    </div>
                    <h3 class="small"><?php echo $beerStyle; ?></h3>
                </div>
                <div class="description">
                    <h4>ABV: <?php echo $abv; ?>% &emsp; IBU: <?php echo $ibu; ?></h4>
                    <p class="text" style="height:220px; overflow-y:scroll;"><?php echo $description; ?></p>
                </div>
                <div class="buy-price">
                    <a href="../home/home.php#new" class="buy">Browse More Beer</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../resources/ProductsPageApp.js"></script>
</body>
</html>