<?php
session_start();
// Send user to login page if they're not logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ".dirname(__FILE__, 2)."../index.php");
    exit;
}

$productInfo = explode("|", $_POST["productId_&_imgFilePath"]);
$productId = $productInfo[0];
$productImgPath = $productInfo[1];
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/css/ProductsPageStyle.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <title> BEER BRAND | Beer Co.</title>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="shoeBackground">
            <div class="gradients">
                <div class="gradient second" color="blue"></div>

            </div>
            <h1 class="nike">Beer Co.</h1>
            <!-- <img src="img/logo.png" alt="" class="logo"><a href="#" class="share"><i class="fas fa-share-alt"></i></a> -->


            <img src="../resources/images/media/budlight.png" alt="" class="shoe show" style="margin:0px 0px 20px 0px;">

        </div>
        <div class="info">
            <div class="shoeName">
                <div>
                    <h1 class="big">BudLight Seltzer</h1>
                    <span class="new">new</span>
                </div>
                <h3 class="small">BudLight Original Pure Malt</h3>
            </div>
            <div class="description">
                <h3 class="title">Product Info</h3>
                <p class="text"><?php echo $productId; ?></p>
            </div>
            <div class="size-container">
                <h3 class="title">size</h3>
                <div class="sizes">
                    <span class="size">S</span>
                    <span class="size">M</span>
                    <span class="size active">L</span>
                </div>
            </div>
            <div class="buy-price">
                <a href="../home/home.php" class="buy">Home</a>
                <div class="price">
                    <i class="fas fa-dollar-sign"></i>
                    <h1>20</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="ProductsPageApp.js"></script>


</body>
</html>