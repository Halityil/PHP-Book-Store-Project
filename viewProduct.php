<?php include 'header.php';
include "classes/Product.php";
$product = new \classes\Product();

if(!isset($_GET['id'])){
    header('Location: products.php');
}
$id = $_GET['id'];
$item = $product->getProduct($id);


//    echo $item['title'];
//    echo $item['price'];
//    echo $item['des'];
//    echo $item['type'];
//    echo $item['author'];
//    echo $item['year'];

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View</title>

<link href="css/view.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="viewdetails">

    <div id="detailscontent">
        <ul class="details">

            <li id="home"><span class="header"></span>
            	<div class="inner">
                	<h2><?= $item['title'] ?></h2>
                    <p><em> <?= $item['des']?></em></p>
                    <img src="productPhotos/<?=$item['image']?>" alt="Image 01" style="width: 300px;" class="image_fl" />



                        </ul>
					</div>
                </div>
            </li>



</body>
</html>

