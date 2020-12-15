<?php
session_start();
// Send user to login page if they're not logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: ".dirname(__FILE__, 2)."../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="../resources/js/home.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>

    <title>Beer Co.</title>
</head>
<body>

<!-- Header -->
<header class="header" id="header">
    <nav class="nav">
        <div class="nav__center container">
            <div class="logo">
                <h1 style="color: #4a1667; font-size:65px;">Beer Co.</h1>
            </div>

            <div class="nav__menu">
                <ul class="nav__list">

                    <li class="nav__item">
                        <a href="#new" class="nav__link scroll-link">New</a>
                    </li>

                    <li class="nav__item">
                        <a href="#find" class="nav__link scroll-link">Find</a>
                    </li>

                    <li class="nav__item">
                        <a href="#all" class="nav__link scroll-link">Featured</a>
                    </li>

                    <li class="nav__item">
                        <a href="#contact" class="nav__link scroll-link">Contact</a>
                    </li>

                    <li class="nav__close flex__center">
                        <svg>
                            <use xlink:href="../resources/images/sprite.svg#icon-cross"></use>
                        </svg>
                    </li>
                </ul>
                <div class="cart flex__center">
                    <svg>
                        <use xlink:href="../resources/images/sprite.svg#icon-user"></use>
                    </svg>
                </div>

                <div class="hamburger flex__center">
                    <svg>
                        <use xlink:href="../resources/images/sprite.svg#icon-menu"></use>
                    </svg>
                </div>
            </div>
        </div>
    </nav>

    <div class="hero">
        <div class="hero__center container">
            <div class="hero__left">
                <h1>Beer Co.</h1>
                <p>
                    We'll help you find the perfect beer.<br><br>
                    Click below to start your search.
                </p>
                <a href="#all" class="button hero__btn">View Beers</a>
            </div>

            <div class="hero__right">
               <img src="../resources/images/media/heineken-original-bottle.png" alt="" class="home__image">
            </div>
        </div>

        <a href="#new" class="go-down flex__center">
            <svg>
                <use xlink:href="../resources/images/sprite.svg#icon-angle-down"></use>
            </svg>
        </a>
    </div>
</header>

<!-- New Products -->
<main>
    <section class="section new" id="new">
        <div class="new__center container">
            <div class="title">
                <h1>New Beers</h1>
            </div>

            <div class="product__center">
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/guinness.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="1795|../resources/images/media/guinness.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Guinness Draught</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/coorslight.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="3470|../resources/images/media/coorslight.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Coors Light</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/corona.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="1619|../resources/images/media/corona.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Corona Extra</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/heineken-beer.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="2832|../resources/images/media/heineken-beer.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Heineken Beer</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- 2 Featured Beers -->
    <section class="section category">
        <div class="category__center container">
            <div class="category__left">
                <div class="content">
                    <h2>Best Beer in Town</h2>
                    <h1>Miller</h1>
                    <a href="#all" class="button category__btn">View Beers</a>
                </div>
                <img src="../resources/images/media/miller-genuine-draft.png" alt="">
            </div>

            <div class="category__right">
                <div class="content">
                    <h2>Big Save</h2>
                    <h1>Save 50%</h1>
                    <a href="#all" class="button category__btn">View Beers</a>
                </div>
                <img src="../resources/images/media/tecatelight.png" alt="">
            </div>
        </div>
    </section>

<!-- Featured Beers -->
    <section class="section all__products" id="all">
        <div class="all__center container">
            <div class="title">
                <h1>Featured Beers</h1>
            </div>

            <div class="product__center">
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/amstel.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="2801|../resources/images/media/amstel.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Amstel Light</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/budweiser-beer-bottle.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="446|../resources/images/media/budweiser-beer-bottle.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Budweiser</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/fat-tire.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="4312|../resources/images/media/fat-tire.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Fat Tire</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/harpoon.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="2771|../resources/images/media/harpoon.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Harpoon IPA</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/coorslight.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="3470|../resources/images/media/coorslight.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Coors Light</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/sol.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="2048|../resources/images/media/sol.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Sol</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/stella.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="1279|../resources/images/media/stella.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Stella Artois</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/busch%20beer.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="615|../resources/images/media/busch%20beer.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Busch</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/michelob.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="987|../resources/images/media/michelob.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Michelob Ultra</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/modelo.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="2673|../resources/images/media/modelo.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Modelo Especial</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/bluemoon.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="3380|../resources/images/media/bluemoon.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Blue Moon</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-empty"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="product__header">
                        <img src="../resources/images/media/parabola.png" alt="">
                        <span class="flex__center">
                            <form action="../product/product.php" method="post">
                                <button type="submit" name="productId_&_imgFilePath" value="2108|../resources/images/media/parabola.png" style="border:0;"><img src="../resources/images/camera_icon.png" height="52" BORDER="0"></button>
                            </form>
                        </span>
                    </div>
                    <div class="product__footer">
                        <h2>Firestone Parabola</h2>
                        <div class="rating">
                                <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                            <span>
                                    <svg>
                                        <use xlink:href="../resources/images/sprite.svg#icon-star-full"></use>
                                    </svg>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Find Beers -->
    <section id="find">
        <div class="all__center container">
            <div class="title">
                <h1>Find Beers</h1>
            </div>

            <!-- Filtering checkboxes -->
            <div class="row">
                <div class="col-md-3">

                    <h2>Search For Beer</h2>
                    <div class="searchBarClass">
                        <input type="text" name="searchBar" class="form-control" placeholder="Start typing a beer brand..." size="24">
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            $("#searchBar").autocomplete({
                                source: "search.php",
                            });
                        });
                    </script>
                    <br />

                    <?php
                        include('Product.php');
                        $product = new Product();
                    ?>
                    <h2>Brand</h2>
                    <div class="list-group" style="height: 220px;
                                                   width: 170px;
	                                               overflow-y: auto;
	                                               overflow-x: hidden;">
                        <?php
                            $brand = $product->getBrand();
                            foreach($brand as $brandDetails) {
                        ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="productDetail Brand_Name" value="<?php echo $brandDetails["Brand_Name"]; ?>" > <?php echo $brandDetails["Brand_Name"]; ?></label>
                        </div>
                        <?php } ?>
                    </div>
                    <br />

                    <h2>Brewer</h2>
                    <div class="list-group" style="height: 220px;
                                                   width: 170px;
	                                               overflow-y: auto;
                                                   overflow-x: hidden;">
                        <?php
                            $brewer = $product->getBrewer();
                            foreach($brewer as $brewerDetails) {
                        ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" id="checkbox" class="productDetail Brewer" value="<?php echo $brewerDetails["Brewer"]; ?>" > <?php echo $brewerDetails["Brewer"]; ?></label>
                        </div>
                        <?php } ?>
                    </div>
                    <br />
                    <h2>Region</h2>

                    <div class="list-group" style="height: 220px;
                                                   width: 170px;
	                                               overflow-y: auto;
                                                   overflow-x: hidden;">
                        <?php
                            $region = $product->getRegion();
                            foreach($region as $regionDetails) {
                        ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="productDetail Origin_region" value="<?php echo $regionDetails["Origin_region"]; ?>" > <?php echo $regionDetails["Origin_region"]; ?></label>
                        </div>
                        <?php } ?>
                    </div>
                    <br />

                    <h2>Country</h2>
                    <div class="list-group" style="height: 220px;
                                                   width: 170px;
	                                               overflow-y: auto;
                                                   overflow-x: hidden;">
                        <?php
                            $country = $product->getCountry();
                            foreach($country as $countryDetails) {
                        ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="productDetail Origin_Country" value="<?php echo $countryDetails["Origin_Country"]; ?>" > <?php echo $countryDetails["Origin_Country"]; ?></label>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- Display filter results -->
                    <div class="col-md-9">
                        <br />
                        <div class="row searchResult">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Email Sign Up --- Doesn't work on localhost? -->
    <section class="contact container" id="contact">
        <div class="contact__left">
            <h1>Join Our Mailing List</h1>
            <p>If you like our products, and want to stay tuned to all the new arrivals,
            <br /> please Subscribe to get the latest offers.</p>
        </div>
        <div class="contact__right">
            <form action="<?php /* $subject='Welcome to BeerCo!';
                                $body='Thank you for subscribing to receive updates from BeerCo.';
                                mail($email, $subject, $body) */ ?>">
                <input type="email" placeholder="Enter email address"
                value="<?php /* echo $username;*/ ?>">
                <a class="button">Subscribe</a>
            </form>
        </div>
    </section>
</main>

<!-- Footer -->
<footer id="footer" class="section footer">
    <div class="container">
        <div class="footer__top">
            <div class="footer-top__box">
                <h3>Explore</h3>
                <a href="#header">Home</a>
                <a href="#new">New</a>
                <a href="find">Find</a>
                <a href="#all">Featured</a>
                <a href="#contact">Contact Us</a>
            </div>
            <div class="footer-top__box">
                <h3>INFORMATION</h3>
                <a href="#">About Us</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Shipping</a>
                <a href="#">Site Map</a>
            </div>
            <div class="footer-top__box">
                <h3></h3>
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
            </div>
            <div class="footer-top__box">
                <h3>CONTACT US</h3>
                <div>
                        <span>
                            <svg>
                                <use xlink:href="../resources/images/sprite.svg#icon-location"></use>
                            </svg>
                        </span>
                    100 Beer Street, 12345 NJ, USA
                </div>
                <div>
                        <span>
                            <svg>
                                <use xlink:href="../resources/images/sprite.svg#icon-envelop"></use>
                            </svg>
                        </span>
                    beerco@email.com
                </div>
                <div>
                        <span>
                            <svg>
                                <use xlink:href="../resources/images/sprite.svg#icon-phone"></use>
                            </svg>
                        </span>
                    123-456-7890
                </div>
                <div>
                        <span>
                            <svg>
                                <use xlink:href="../resources/images/sprite.svg#icon-paperplane"></use>
                            </svg>
                        </span>
                    NJ City, USA
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>
</body>
</html>