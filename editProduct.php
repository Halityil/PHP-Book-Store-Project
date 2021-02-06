<?php include 'header.php';?>
<br>
<br>
<br>
<br>
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
        echo "Deleted";
    } else {
        echo "Error Occurred";
    }

}
elseif (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $des = $_POST['des'];
    $type = $_POST['type'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $result = $product->editProduct($_GET['id'],$title, $price, $des, $type, $author, $year );
    if ($result) {
        echo "Database Updated";
    } else {
        echo "Error occurred";
    }

}
else {
    ?>

    <form method="post" action="">
        <input type="text" name="title" value="<?=$item['title']?>"> Book Title
        <input type="number" name="price" value="<?=$item['price']?>"> Book Price
        <input type="text" name="des" value="<?=$item['des']?>"> Description of Book
        <input type="text" name="type" value="<?=$item['type']?>"> Type of Book
        <input type="text" name="author" value="<?=$item['author']?>"> Author of Book
        <input type="number" name="year" value="<?=$item['year']?>"> Year of Release
        <input type="submit" name="submit" value="edit">

        <input type="submit" name="delete" value="delete">

    </form>
    <?php
}
?>

<!--dont forget to add js validator-->