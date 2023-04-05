<?php
require('database.php');
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$queryproduct = 'SELECT * FROM products WHERE productId = :product_id';
$statement0 = $db->prepare($queryproduct);
$statement0->bindValue(':product_id',$product_id);
$statement0-> execute();
$product = $statement0->fetch();
$statement0->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Edit Product</h1>
        <form action="edit_product.php" method="post"
              id="add_product_form">
            <input type ="hidden" name="product_id" value="<?php echo $product['productID'] ?>">

            <label>Category:</label>
            <input type="text" name="category_id" value="<?php echo $product['categoryID'];?>"><br>

            <label>Code:</label>
            <input type="text" name="code" value="<?php echo $product['productCode'];?>"><br>

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $product['productName'];?>"><br>

            <label>List Price:</label>
            <input type="text" name="price" value="<?php echo$product['listPrice'];?>"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Edit Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>