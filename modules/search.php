<?php

$models = isset($_GET['cat']) && is_numeric($_GET['cat'])?$_GET['cat']:1;
$model = isset($_GET['q'])?"and name_model like '%".$_GET['q']."%'":"";
$product = Product::getAll("where models_id = $models {$model}");
foreach($product as $rw){
?>

	<div class="product">
		<h5><?php echo $rw->name_brand; ?></h5>
		
		<p><?php echo $rw->name_model; ?></p>
		
		<img src="img/<?php echo $rw->image; ?>" width="180px" height="160px"/>
		
		<p>Price:<?php echo $rw->price; ?>€</p>
		
		<p>Availability:<?php echo $rw->availability; ?></p>
		
		<a href="?page=7&pid=<?php echo $rw->id; ?>">Buy now</a>
		
	</div>
	
<?php
}
?>
<div class="products">
</div>