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


    //delete old image
    unlink("productPhotos/".$item['image']);
    //upload new one
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



    $result = $product->editProduct($_GET['id'],$title, $price, $des, $type, $author, $year,$filename );
    if ($result) {
        echo "Database Updated";
    } else {
        echo "Error occurred";
    }

}
else {
    ?>

    <form method="post" action="" enctype="multipart/form-data">
        <input type="text" name="title" value="<?=$item['title']?>"> Book Title
        <input type="number" name="price" value="<?=$item['price']?>"> Book Price
        <input type="text" name="des" value="<?=$item['des']?>"> Description of Book
        <input type="text" name="type" value="<?=$item['type']?>"> Type of Book
        <input type="text" name="author" value="<?=$item['author']?>"> Author of Book
        <input type="number" name="year" value="<?=$item['year']?>"> Year of Release
        <input type="file" name="img" > image
        <input type="submit" name="submit" value="edit">

        <input type="submit" name="delete" value="delete">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">update user</div>
                        <div class="card-body">
                            <img src="userPhotos/<?= $item['image']?>" class="center">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="name" id="name" value="<?=$item['name']?>"
                                                   placeholder="Enter your Name"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="surname" class="cols-sm-2 control-label">Your Surname</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="surname" id="surname" value="<?=$item['surname']?>"
                                                   placeholder="Enter your Surname"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa"
                                                                           aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="email" id="email" value="<?=$item['email']?>"
                                                   placeholder="Enter your Email"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="cols-sm-2 control-label">Password</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                           aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="password" id="password" value="<?=$item['password']?>"
                                                   placeholder="Enter your Password"/>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>
                                <label for="img">Select image:</label>
                                <input type="file" id="img" name="img">
                                <div class="form-group ">
                                    <br>
                                    <input type="submit" class="btn btn-primary btn-lg btn-block login-button"
                                           name="submit" value="update">
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>
    <?php
}
?>

<!--dont forget to add js validator-->