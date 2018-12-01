<?php
require "../config.php";
if(!Session::get('status')||Session::get('status')!=3){
	header("location: index.html");
}
	

	$selectedModel = new Model;


	if(isset($_GET['mid'])){
		$selectedModel = Model::get($_GET['mid']);
	}
	
	if(isset($_POST['btn_add'])){
		$selectedModel = new Model;
		$selectedModel->name_model = $_POST['tb_name'];
		$selectedModel->id = mysqli_insert_id(Database::getInstance());
		$selectedModel->insert();
		//mysqli_query($conn,"insert into models values (null,'{$selected_name}')");
		//$selected_id = mysqli_insert_id($conn);
	}
	
	if(isset($_POST['btn_update'])){
		$selectedModel = Model::get($_POST['selBrand']);
		$selectedModel->name_model = $_POST['tb_name'];
		$selectedModel->save();
	}
	
	if(isset($_POST['btn_delete'])){
		/*
		$selected_name = $_POST['tb_name'];
		$selected_id = $_POST['selBrand'];
		mysqli_query($conn,"delete from models where id= {$selected_id}");
		*/
		$selectedModel = new Model;
		$selected_id = $_POST['selBrand'];
		$selectedModel->name_model = $_POST['tb_name'];
		$selectedModel->delete($selected_id);
	}
	
?>
<form method="post" action="">
<?php
//$query = mysqli_query($conn,"select * from models"); Proceduralni kod upita
$allModels = Model::getAll();
?>
<select onchange="if(this.value < 0) return; window.location='?mid='+this.value" name="selBrand">
	<option value="-1">Select brand</option>
	<?php
	foreach($allModels as $rw){
		echo "<option " . ($selectedModel->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->name_model}</option>";
	}
	?>
</select><br /><br />
Name Brand:<br/>
	<input type="text" name="tb_name" value="<?php echo $selectedModel->name_model; ?>" /><br /><br />
	<input type="submit" name="btn_add" value="Add New" />
	<input type="submit" name="btn_update" value="Update" />
	<input type="submit" name="btn_delete" value="Delete" />
</form>
<p><a href="index.php">Back to dashboard.</a></p>