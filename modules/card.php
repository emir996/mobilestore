<?php
Session::start();


if(!isset($_SESSION['card'])){
	$_SESSION['card'] = array();
}

if(isset($_POST['pid'])&&isset($_POST['quantity'])){
	if(isset($_SESSION['card'][$_POST['pid']])){
		$_SESSION['card'][$_POST['pid']]+=$_POST['quantity'];
	}else{
		$_SESSION['card'][$_POST['pid']]=$_POST['quantity'];
	}
	if($_SESSION['card'][$_POST['pid']]<=0){
		unset($_SESSION['card'][$_POST['pid']]);
	}
}

if(empty($_SESSION['card'])){
	echo "<h4 class='center'>Card is empty.</h4>";
	return;
}


$product_id = array_keys($_SESSION['card']);
$product_id_string = implode(",",$product_id);




$products = Product::getAll("where id in ($product_id_string)");
foreach ($products as $rw){
?>

	<div class="product">
		<h5><?php echo $rw->name_brand; ?></h5>
		
		<p><?php echo $rw->name_model; ?></p>
		
		<img src="img/<?php echo $rw->image; ?>" width="180px" height="160px"/>
		
		<p>Cena:<?php echo $rw->price; ?>€</p>

		<p>Kolicina:<?php echo $_SESSION['card'][$rw->id]; ?> </p>

		<a href="?page=7&pid=<?php echo $rw->id; ?>">Obrisi iz karte</a>

		<h5><a href="?page=9">Poruci</a></h5>
		
	</div>
<?php
}
?>
	
<div class="products">
</div>