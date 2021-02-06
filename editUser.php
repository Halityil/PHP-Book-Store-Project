<?php include 'header.php';?>
    <br>
    <br>
    <br>
    <br>
<?php

include "classes/User.php";
$product = new \classes\User();

if(!isset($_GET['id']) && !$_SESSION['loginInfo']['is_admin']){
    header('Location: index.php');
}

$item = $product->getUser($_GET['id']);


if (isset($_POST['delete'])) {

    $result = $product->deleteUser($_GET['id']);
    if ($result) {
        echo "Deleted";
    } else {
        echo "Error Occurred";
    }

}
elseif (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $result = $product->editUser($_GET['id'],$name, $surname, $email, $password);
    if ($result) {
        echo "Database Updated";
    } else {
        echo "Error occurred";
    }

}
else {
?>
    <form method="post" action="">
        <input type="text" name="title" value="<?=$item['name']?>"> User Name
        <input type="text" name="price" value="<?=$item['surname']?>"> User Surname
        <input type="text" name="des" value="<?=$item['email']?>"> User Email
        <input type="text" name="type" value="<?=$item['password']?>"> User Password

        <input type="submit" name="delete" value="delete">

    </form>
    <?php
}
?>