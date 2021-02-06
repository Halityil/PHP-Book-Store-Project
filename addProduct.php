<?php
include 'header.php';
include "classes/Product.php";
$product = new \classes\Product();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $des = $_POST['des'];
    $type = $_POST['type'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $result = $product->addProduct($title, $price, $des, $type, $author, $year);
    if ($result) {
        echo "Added";
    } else {
        echo "Error Occurred";
    }

} else {
    ?>
<Br>
    <Br>
    <Br>
    <Br>

    <form method="post" action="">
        <input type="text" name="title"> Title of Book
        <input type="number" name="price"> Price of Book
        <input type="text" name="des"> Description of Book
        <input type="text" name="type"> Type of Book
        <input type="text" name="author"> Author Name
        <input type="number" name="year"> Year of Release
        <input type="submit" name="submit" value="Add to Database">

    </form>
    <?php
}
?>

<!--dont forget to add js validator-->