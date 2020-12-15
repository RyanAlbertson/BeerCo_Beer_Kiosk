<?php
// Searches for filtered products. Returns the HTML formated results from action.php.

require_once "Product.php";
$product = new Product();
if(isset($_POST["action"])){
    $html = $product->searchProducts($_POST);
    $data = array(
        "html" => $html,
    );
    echo json_encode($data);
}
?>