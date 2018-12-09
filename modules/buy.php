<?php
//Setting id parameters
$id = isset($_GET['pid'])&&is_numeric($_GET['pid'])?$_GET['pid']:0;
//Instantiate Product class and method getAll with filtration query
$products = Product::getAll("where id = $id");
foreach($products as $rw)
if(!$rw){
	echo "<h4 class='center'>This phone does not exist!</h4>";
}else{
?>

	<div class="product">
		<h5><?php echo $rw->name_brand; ?></h5>
		
		<p><?php echo $rw->name_model; ?></p>
		
		<img src="img/<?php echo $rw->image; ?>" width="180px" height="160px"/>
		
		<p>Price:<?php echo $rw->price; ?>€</p>
		
		<p>Availability:<?php echo $rw->availability; ?></p>
		
	</div>
	<!-- Form for order more than one same product -->
	<form action="?page=3" method="POST">
		<input type="hidden" name="pid" value="<?php echo $rw->id; ?>" />
		<input type="number" name="quantity" value="1" /> <input type="submit" value="add" />
	</form>

<div class="products">
</div>
<?php
}