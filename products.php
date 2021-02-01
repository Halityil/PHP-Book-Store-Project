
<?php

session_start();
if (!isset($_SESSION['loginInfo'])){
    header('Location: login.php');
}

include 'header.php';?>
<main role="main">

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
<!--        get all products from bd-->
<!--        for each print here-->
                <?php for ($i=0;$i<10;$i++){?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top"
                             src="img/5.jpg"
                             data-holder-rendered="true">
                        <div class="card-body">
                            <h6>title</h6>
                            <p class="card-text">Aciklama   This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                </div>
                                <small class="text-muted">yazar</small>
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