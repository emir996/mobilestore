<?php
//Setting GET parameters 
$models = isset($_GET['pid']) && is_numeric($_GET['pid'])?$_GET['pid']:1;
//Instantiate class Product and taking id from models table
$products = Product::getAll("where models_id = $models");
foreach($products as $rw){
?>

	<div class="product">
		<h5><?php echo $rw->name_brand; ?></h5>
		
		<p><?php echo $rw->name_model; ?></p>
		
		<img src="img/<?php echo $rw->image; ?>" width="180px" height="160px"/>
		
		<p>Cena:<?php echo $rw->price; ?>€</p>
		
		<p>Stanje:<?php echo $rw->availability; ?></p>
		
		<a href="?page=7&pid=<?php echo $rw->id; ?>">Kupi sada</a>
		
	</div>
	
<?php
}
?>
<div class="products">
</div>