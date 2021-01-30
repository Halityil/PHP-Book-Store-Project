<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<?php include 'header.php';?>

<?php
include 'classes/User.php';
session_start();
if (!empty($_SESSION['loginInfo'])){
    header('Location: index.php');
}
if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])){
    //get from db
    $user = new \classes\User();
    $userDetails = $user->loginUser($_POST['email'],$_POST['password']);
    //create session
    if($userDetails){
        $_SESSION['loginInfo'] = $userDetails;
        header('Location: index.php');
    }
    else echo "Wrong email or password";

}
else{
    if(isset($_POST['submit']) && (empty($_POST['email']) || empty($_POST['password']))){
        echo "<span style='color: red'>pls dont make it empty</span>";
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">

                        <form class="form-horizontal" method="post" action="#">


                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label">Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <br>
                                <input type="submit" class="btn btn-primary btn-lg btn-block login-button" name="submit" value="login">
                            </div>
                            <div class="login-register">
                                <a href="register.php">Register</a>
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

<?php include 'footer.php';?>


