<?php
	require '../config.php';
	//Checking Session and admin status
	if(!Session::get('status')||Session::get('status')!=3){
		header("location: index.html");
	}
		//Instantiate class Related
		$selectedRelated_products = new Related;

	//Setting Get parameters
	if(isset($_GET['proid'])){
	  $selectedRelated_products = Related::get($_GET['proid']);
	}

	//Setting button for adding new product
	if(isset($_POST['btn_add'])){
		$selectedRelated_products = new Related;
		$selectedRelated_products->name_brand = $_POST['tb_brand'];
		$selectedRelated_products->name_model = $_POST['tb_model'];
		
		if(isset($_FILES['fup_image'])){
		move_uploaded_file($_FILES['fup_image']['tmp_name'],"../img/".$_FILES['fup_image']['name']);
		$selectedRelated_products->image = $_FILES['fup_image']['name'];
	}
		
		$selectedRelated_products->price = $_POST['tb_price'];
		$selectedRelated_products->id = mysqli_insert_id(Database::getInstance());
		$selectedRelated_products->insert();
	}
	//Setting button for update product
	if(isset($_POST['btn_update'])){
		$selectedRelated_products = Related::get($_POST['sel_product']);
		$selectedRelated_products->name_brand = $_POST['tb_brand'];
		$selectedRelated_products->name_model = $_POST['tb_model'];
		$selectedRelated_products->price = $_POST['tb_price'];
		
		if(isset($_FILES['fup_image']) && $_FILES['fup_image']['size']>0){
		move_uploaded_file($_FILES['fup_image']['tmp_name'],"../img/".$_FILES['fup_image']['name']);
		$selectedRelated_products->image = $_FILES['fup_image']['name'];
		$selectedRelated_products->save();
	}
	}
	
	//Setting button for delete product
	if(isset($_POST['btn_delete'])){
		$selectedRelated_products = new Related;
		$selected_id = $_POST['sel_product'];
		$selectedRelated_products->name_brand = $_POST['tb_brand'];
		$selectedRelated_products->name_model = $_POST['tb_model'];
		$selectedRelated_products->price = $_POST['tb_price'];
		if(isset($_FILES['fup_image'])){
		move_uploaded_file($_FILES['fup_image']['tmp_name'],"../img/".$_FILES['fup_image']['name']);
		$selectedRelated_products->image = $_FILES['fup_image']['name'];
	}
		$selectedRelated_products->delete($selected_id);
		//mysqli_query($conn,"delete from related_products where id = {$selected_id}");
	}
?>

<!-- This is form for setting Related_product table in database -->
<form action="" method="post" enctype="multipart/form-data">
	<select onchange="if(this.value<0) return; window.location='?proid='+this.value" name="sel_product">
		<option value="-1">Select brand</option>
	<?php
	//Calling class Related and method getAll
	$allRelated = Related::getAll();
	?>
	<?php
	foreach($allRelated as $rw){
		echo "<option " . ($selectedRelated_products->id==$rw->id?"selected":"") . "  value='{$rw->id}'>{$rw->name_brand}</option>";
	}
	?>
	</select><br /><br />
	Brand:<br/>
	<input type="text" name="tb_brand" value="<?php echo $selectedRelated_products->name_brand; ?>" />
	<br />
	Model:<br/>
	<input type="text" name="tb_model" value="<?php echo $selectedRelated_products->name_model; ?>" /><br />
	Price:<br/>
	<input type="text" name="tb_price" value="<?php echo $selectedRelated_products->price; ?>" /><br />
	<br/>
	<img src="../img/<?php echo$selectedRelated_products->image; ?>" width="150" height="150" />
	<input type="file" name="fup_image" />
	<br/><br />
	<input type="submit" name="btn_add" value="Add New" />
	<input type="submit" name="btn_update" value="Update" />
	<input type="submit" name="btn_delete" value="Delete" />
</form>
	<p><a href="index.php">Back to dashboard.</a></p>