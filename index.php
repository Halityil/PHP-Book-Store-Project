<?php
include 'header.php';
include 'classes/Product.php';
if (!isset($_SESSION['loginInfo'])){
    header('Location: login.php');
}


$product = new \classes\Product();

    $items = $product->getAllProducts();

?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
        <title>HSBook</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/layout.css" type="text/css">
    </head>
    <body>


    <div class="wrapper row2">
        <div id="container" class="clear">

            <div id="homepage">

                <section id="latest" class="clear">

                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <article class="one_quarter lastbox">
                            <figure>
                                <a href="viewProduct.php?id=<?= $items[$i]['id']?>">
                                <img src="productPhotos/<?=$items[$i]['image']?>" width="215" height="315" alt="">
                                </a>
                                <figcaption><?= $items[$i]['title']?></figcaption>
                            </figure>
                        </article>
                    <?php } ?>

                </section>

                <div id="content">
                    <section id="services" class="last clear">
                        <ul>
                            <li>
                                <article class="clear">
                                    <figure><img src="img/books.png" alt="">
                                        <figcaption>
                                            <h2>Checkout Our Collection</h2>
                                            <p>Our collection of books includes thousand of books from thousands of
                                                authors to see our all products click <a href="products.php"
                                                                                         title="Best Products">HERE!</a>
                                            </p>

                                        </figcaption>
                                    </figure>
                                </article>
                            </li>

                            <li class="last">
                                <article class="clear">
                                    <figure><img src="img/6.jpg" alt="">
                                        <figcaption>
                                            <h2>Reward Winning Website</h2>
                                            <p>HSBook Store has been selected as the widest number of collection and the
                                                most reliable online book store in 2020 So you can be sure that you are
                                                in safe hands while buying from us!</p>
                                        </figcaption>
                                    </figure>
                                </article>
                            </li>
                        </ul>
                    </section>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <h6 class="title">Follow Us On Our Social Medias</h6>
                <nav>
                    <ul>
                        <li><a href="https://www.facebook.com">Facebook</a></li>
                        <li><a href="https://www.instagram.com/Tower-PCs/ROG-Strix-GA15-G15DH/">Instagram</a></li>
                        <li><a href="https://www.twitter.com/Laptops/ASUS-TUF-Gaming-FX505DY/">Twitter</a></li>
                        <li><a href="https://www.pinterest.com/Gaming-Networking/Gaming-Router-Home/">Pinterest</a></li>
                    </ul>
                </nav>


            </div>
        </div>


    </body>

    </html>

<?php include 'footer.php'; ?>