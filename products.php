
<?php


include "classes/Product.php";

$products = new \classes\Product();

$allProducts = $products->getAllProducts();

session_start();
if (!isset($_SESSION['loginInfo'])){
    header('Location: login.php');
}

include 'header.php';?>
<main role="main">

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php foreach ($allProducts as $product){?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top"
                             src="img/5.jpg"
                             data-holder-rendered="true">
                        <div class="card-body">
                            <h6><?= $product['title']?></h6>
                            <p class="card-text description"><?= $product['des']?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="viewProduct.php" type="button" class="btn btn-sm btn-outline-secondary">View</a>

                                    <?php if($_SESSION['loginInfo']["is_admin"]){?>
                                    <a href="editProduct.php?id=<?=$product['id']?>" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <?php }?>

                                </div>
                                <small class="text-muted"><?=$product['price']?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>

</main>
<?php include "footer.php" ?>