<?php

$id = isset($_GET['pid'])&&is_numeric($_GET['pid'])?$_GET['pid']:0;
//$query = mysqli_query($conn,"select * from related_products where id = {$id}");
//$rw=mysqli_fetch_object($query);
$related_products = Related::getAll("where id = $id");
foreach($related_products as $rw)
if(!$rw){
	echo "This phone does not exist!";
}else{
?>

	<div class="product">
			
		<h5><?php echo $rw->name_brand; ?></h5>
		
		<p><?php echo $rw->name_model; ?></p>
		
		<img src="img/<?php echo $rw->image; ?>" width="180px" height="160px"/>
		
		<p>Price:<?php echo $rw->price; ?>€</p>
	
		<a href="?page=8&pid=<?php echo $rw->id; ?>">Buy now</a>
	
	</div>
	<form action="?page=3" method="POST">
		<input type="hidden" name="pid" value="<?php echo $rw->id; ?>" />
		<input type="number" name="quantity" value="1" /> <input type="submit" value="add" />
	</form>

<div class="products">
</div>
<?php
}