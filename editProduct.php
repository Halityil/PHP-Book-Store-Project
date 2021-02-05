<?php

include "classes/Product.php";
$product = new \classes\Product();

if(!isset($_GET['id']) && !$_SESSION['loginInfo']['is_admin']){
    header('Location: index.php');
}

$item = $product->getProduct($_GET['id']);


if (isset($_POST['delete'])) {

    $result = $product->deleteProduct($_GET['id']);
    if ($result) {
        echo "deleted";
    } else {
        echo "error";
    }

}
elseif (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $des = $_POST['des'];

    $result = $product->editProduct($_GET['id'],$title, $price, $des);
    if ($result) {
        echo "updated";
    } else {
        echo "error";
    }

}
else {
    ?>

    <form method="post" action="">
        <input type="text" name="title" value="<?=$item['title']?>"> title
        <input type="number" name="price" value="<?=$item['price']?>"> price
        <input type="text" name="des" value="<?=$item['des']?>"> des
        <input type="submit" name="submit" value="edit">

        <input type="submit" name="delete" value="delete">

    </form>
    <?php
}
?>

<!--dont forget to add js validator-->