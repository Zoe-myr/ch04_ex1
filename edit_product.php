<?php
// Get the product data

$product_id = filter_input(INPUT_POST,'product_id');
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    $query = 'UPDATE products
              SET categoryID = :category_id,
                  productCode = :code,
                  productName = :name,
                  listPrice = :price
              WHERE productID = :product_id';
    $statment = $db->prepare($query);
    $statment->bindValue(':category_id',$category_id);
    $statment->bindValue(':code',$code);
    $statment->bindValue(':name',$name);
    $statment->bindValue(':price',$price);
    $statment->bindValue(':product_id',$product_id);
    $statment->execute();
    $statment->closeCursor();
    
    include('index.php');
}