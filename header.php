<?php session_start(); ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/custom.css">

<div class="container">
    <div class="header">
        <img src="img/logo.jpg" alt="Logo">

        <?php if (isset($_SESSION['loginInfo'])) { ?>
            <img style="height: 90px; margin-left: 20px " src="userPhotos/<?= $_SESSION['loginInfo']['image'] ?>"
                 alt="Logo"> Welcome <?= $_SESSION['loginInfo']['name'] . " " . $_SESSION['loginInfo']['surname'] ?>
            <?php
        }
        ?>


        <div class="header-right">

            <a class="active" href="index.php">Home</a>
            <a href="products.php">Products</a>
            <?php if (isset($_SESSION['loginInfo']) && $_SESSION['loginInfo']['is_admin']) {
                ?><a href="allUsers.php">All Users</a>
            <?php } ?>

            <a href="contact.php">Contact Us</a>
            <?php if (isset($_SESSION['loginInfo'])) { ?>
                <a href="logout.php">logout</a>
                <a href="editUser.php?id=<?= $_SESSION['loginInfo']['id'] ?>">
                    <img src="img/user.png" alt="User">
                </a>
            <?php } else { ?>
                <a href="login.php">login</a>
            <?php } ?>


        </div>
    </div>
</div>
