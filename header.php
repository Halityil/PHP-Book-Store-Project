<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/custom.css">

<div class="container">
    <div class="header">
        <img src="img/logo.jpg" alt="Logo">
        <div class="header-right">
            <a class="active" href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="contact.php">Contact Us</a>
            <?php if(isset($_SESSION['loginInfo'])){?>
                <a href="logout.php">logout</a>
            <?php } else{?>

                <a href="login.php">login</a>
            <?php }?>
            <a href="#">
                <img src="img/basket.png" alt="Basket">
            </a>
                <a href="#">
                    <img src="img/user.png" alt="User">
                </a>
        </div>
    </div>
</div>
