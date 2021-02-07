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


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //delete old image
    unlink("userPhotos/".$item['image']);


    //upload new one

    $target_dir = "userPhotos/";

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


    //upload db

    $result = $product->editUser($_GET['id'],$name, $surname, $email, $password,$filename);
    if ($result) {
        echo "Database Updated";
    } else {
        echo "Error occurred";
    }

}
else {
?>


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


    <?php
}
?>