<?php
	session_start();
	if(!isset($_SESSION['status'])||$_SESSION['status']!=3){
		header("location: index.html");
	}
?>

<a href="models.php">Models</a><br />
<a href="products.php">Products</a><br />
<a href="related_product.php">Related products</a><br />
<a href="logout.php">Logout</a>