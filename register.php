<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<?php include 'header.php';?>

<?php
include 'classes/User.php';
session_start();
if (!empty($_SESSION['loginInfo'])) {
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    //check if user exists
    //add to db


} else {
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">

                        <form class="form-horizontal" method="post" action="#">

                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="surname" class="cols-sm-2 control-label">Your Surname</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="surname" id="surname" placeholder="Enter your Surname" />
                                    </div>
                                </div>
                            </div>

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
                            <div class="form-group">
                                <label for="password2" class="cols-sm-2 control-label">Confirm Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm your Password" />
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <input type="radio" id="Male" name="drone" value="Male"
                                           checked>
                                    <label for="Male">Male</label>
                                </div>

                                <div>
                                    <input type="radio" id="Female" name="drone" value="Female">
                                    <label for="Female">Female</label>
                                </div>

                                <br>
                                <label for="img">Select image:</label>
                                <input type="file" id="img" name="img" accept="image/*">
                                <input type="submit">


                                <div class="form-group ">
                                    <br>
                                    <input type="submit" class="btn btn-primary btn-lg btn-block login-button" name="submit" value="Register">
                                </div>
                                <div class="login-register">
                                    <a href="login.php">Login</a>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>

    <?php
}
?>

<script>
    $(function () {
        $("form[name='register']").validate({
            rules: {
                name: "required",
                surname: "required",
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password2 : {
                    equalTo : "#password"
                }
            },
            messages: {
                name: "Please enter your firstname",
                surname: "Please enter your lastname",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password2: {
                    equalTo: "Please enter the same value again",
                },
                email: "Please enter a valid email address"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>

<?php include 'footer.php';?>


