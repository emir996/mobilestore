<?php
require "../config.php";
//Checking Session and admin status
if(!Session::get('status')||Session::get('status')!=3){
	header("location: index.html");
}
//Instantiate Product class
$selectedProduct = new Product;

	////Setting Get parameters
	if(isset($_GET['pid'])){
		$selectedProduct = Product::get($_GET['pid']);
	}
	
	//Setting button for adding new product
	if(isset($_POST['btn_add'])){
		$selectedProduct = new Product;
		$selectedProduct->name_brand = $_POST['tb_brand'];
		$selectedProduct->name_model = $_POST['tb_model'];
		
		if(isset($_FILES['fup_image'])){
		move_uploaded_file($_FILES['fup_image']['tmp_name'],"../img/".$_FILES['fup_image']['name']);
		$selectedProduct->image = $_FILES['fup_image']['name'];
	}
		
		$selectedProduct->price = $_POST['tb_price'];
		$selectedProduct->availability = isset($_POST['cb_availability']);
		$selectedProduct->models_id = $_POST['sel_brand'];
		$selectedProduct->id = mysqli_insert_id(Database::getInstance());
		$selectedProduct->insert();
		//mysqli_query($conn,"insert into products values (null,'{$selected_brand}','{$selected_model}','{$selected_image}','{$selected_price}','{$selected_availability}','{$selected_models}')");
		//$selected_id = mysqli_insert_id($conn);
	}
	
	//Setting button for update product
	if(isset($_POST['btn_update'])){
		$selectedProduct = Product::get($_POST['selProduct']);
		$selectedProduct->name_brand = $_POST['tb_brand'];
		$selectedProduct->name_model = $_POST['tb_model'];
		
		if(isset($_FILES['fup_image'])&& $_FILES['fup_image']['size']>0){
		move_uploaded_file($_FILES['fup_image']['tmp_name'],"../img/".$_FILES['fup_image']['name']);
		$selectedProduct->image = $_FILES['fup_image']['name'];
		}
		
		$selectedProduct->price = $_POST['tb_price'];
		$selectedProduct->availability = isset($_POST['cb_availability']);
		$selectedProduct->models_id = $_POST['sel_brand'];
		$selectedProduct->save();
		//mysqli_query($conn,"update products set name_brand='{$selected_brand}',name_model='{$selected_model}',image='{$selected_image}',price='{$selected_price}',availability='{$selected_availability}',models_id='{$selected_models}' where id= {$selected_id}");
	}

	//Setting button for deleting product
	if(isset($_POST['btn_delete'])){
		$selectedProduct = new Product;
		$selected_id = $_POST['selProduct'];
		$selectedProduct->name_brand = $_POST['tb_brand'];
		$selectedProduct->name_model = $_POST['tb_model'];
		
		if(isset($_FILES['fup_image'])){
		move_uploaded_file($_FILES['fup_image']['tmp_name'],"../img/".$_FILES['fup_image']['name']);
		$selectedProduct->image = $_FILES['fup_image']['name'];
		}
		
		$selectedProduct->price = $_POST['tb_price'];
		$selectedProduct->availability = isset($_POST['cb_availability']);
		$selectedProduct->models = $_POST['sel_brand'];
		$selectedProduct->delete($selected_id);
		//mysqli_query($conn,"delete * from products where id = {$selected_id}");
		
	}
	
	
	
?>	
<!-- This is form for setting product table in database -->
<div class="center">	
<form action="" method="post" enctype="multipart/form-data">
	<select onchange="if(this.value<0) return; window.location='?pid='+this.value" name="selProduct">
		<option value="-1">Select brand</option>
	<?php
	//Calling Product class and method getAll
	$allProducts = Product::getAll();
	?>
	<?php
	foreach($allProducts as $rw){
		echo "<option " . ($selectedProduct->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->name_brand}</option>";
	}
	?>
	</select><br /><br />
	Brand:<br/>
	<input type="text" name="tb_brand" value="<?php echo $selectedProduct->name_brand; ?>" />
	<br />
	Model:<br/>
	<input type="text" name="tb_model" value="<?php echo $selectedProduct->name_model; ?>" /><br />
	Price:<br/>
	<input type="text" name="tb_price" value="<?php echo $selectedProduct->price; ?>" /><br />
	Availabilty:<br/>
	<input type="checkbox" name="cb_availability" <?php echo ($selectedProduct->availability)?"checked":""; ?> /><br />
	Category:<br/>
	<?php
		//Calling Class Model and method getAll
		$allModels = Model::getAll();
	?>
	<select name="sel_brand">
	<option value="-1">Select category</option>
	<?php
	foreach($allModels as $rw){
		echo "<option " . ($selectedProduct->models_id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->name_model}</option>";
	}
	?>
	</select><br/>
	<img src="../img/<?php echo $selectedProduct->image; ?>" width="150" height="150" />
	<input type="file" name="fup_image" />
	<br/><br />
	<input type="submit" name="btn_add" value="Add New" />
	<input type="submit" name="btn_update" value="Update" />
	<input type="submit" name="btn_delete" value="Delete" />
</form>
	<p><a href="index.php">Back to dashboard.</a></p>
</div>
	