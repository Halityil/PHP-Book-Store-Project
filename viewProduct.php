<?php include 'header.php';?>
<?php

include "classes/Product.php";
$product = new \classes\Product();

public function getProduct($id){
        $query = "SELECT * FROM products where id = ".$id;
        $result = $this->mysqli->query($query);

        return $result->fetch_assoc();
    }

    $result = $_GET[$'$id']("SELECT * FROM example WHERE id='$id'");
while ($row = mysql_fetch_assoc($result)) {
    echo ($row['title'] == $id) ? $row['title'] : '';
    echo ($row['price'] == $id) ? $row['price'] : '';
    echo ($row['des'] == $id) ? $row['des'] : '';
    echo ($row['type'] == $id) ? $row['type'] : '';
    echo ($row['author'] == $id) ? $row['author'] : '';
    echo ($row['year'] == $id) ? $row['year'] : '';
}

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
                	<h2>Free Template, Metallic Slider</h2>
                    <p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit semper commodo. Nunc pretium, nibh in dapibus tristique, felis lectus cursus arcu, quis rutrum odio odio eu sem. Aliquam metus magna, eleifend in lacinia sed, dictum sed lorem. </em></p>
                	<img src="images/tooplate_image_01.jpg" alt="Image 01" class="image_fl" />



                        </ul>
					</div>
                </div>
            </li>



</body>
</html>

