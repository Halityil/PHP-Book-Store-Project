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

    //upload image
    $target_dir = "productPhotos/";
    //get time as an int to create unique id for each user
    $time = round(microtime(true));
    $filename = $time . "." . pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    $target_file = $target_dir . $filename;

    //check before upload file if its image
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check){
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    }else{
         $filename = "";
    }

    $result = $product->addProduct($title, $price, $des, $type, $author, $year, $filename);
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

    <form method="post" action="" enctype="multipart/form-data">
        <input type="text" name="title"> Title of Book
        <input type="number" name="price"> Price of Book
        <input type="text" name="des"> Description of Book
        <input type="text" name="type"> Type of Book
        <input type="text" name="author"> Author Name
        <input type="number" name="year"> Year of Release
        <input type="file" name="img"> image
        <input type="submit" name="submit" value="Add to Database">

    </form>
    <?php
}
?>

<!--dont forget to add js validator-->