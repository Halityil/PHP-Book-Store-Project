<?php

include "classes/Product.php";
$product = new \classes\Product();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $des = $_POST['des'];

    $result = $product->addProduct($title, $price, $des);
    if ($result) {
        echo "added";
    } else {
        echo "error";
    }

} else {
    ?>

    <form method="post" action="">
        <input type="text" name="title"> title
        <input type="number" name="price"> price
        <input type="text" name="des"> des
        <input type="submit" name="submit" value="add">

    </form>
    <?php
}
?>

<!--dont forget to add js validator-->