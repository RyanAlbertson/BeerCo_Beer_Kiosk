<?php
// Searches for filtered products. Returns the HTML formating of the results.
session_start();
include 'Product.php';

echo "INSIDE ACTION.PHP";

$product = new Product();
if(isset($_POST["action"])){
    $html = $product->searchProducts($_POST);
    $data = array(
        "html" => $html,
    );
    echo json_encode($data);
}
?>