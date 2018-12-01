<div class="orders">
	<div class="center">
		<form action="" method="POST">	
			Ime:<input type="text" name="tb_name" /><br /><br />
			Adresa:<input type="textarea" name="tb_adress"/><br /><br/>
			<input type="submit" name="btn_checkout" value="Potvrdi"/>
		</form>
	</div>
</div>
<?php



if(isset($_POST['btn_checkout'])){
	$name = $_POST['tb_name'];
	$adress = $_POST['tb_adress'];
	if(empty($name) || empty($adress)){
		die('<h4 class="center">Sva polja moraju biti ispunjena.</h4>');
	}else{
	Session::start();
	if(!isset($_SESSION['card']) || empty($_SESSION['card'])){
		echo "<h4 class='center'>Korpa je prazna!</h4>";
	}else{
		$cardcontent = json_encode($_SESSION['card']);
		$q = "insert into orders values (null,'{$name}','{$adress}','{$cardcontent}')";
		if(mysqli_query(Database::getInstance(),$q)){
			echo "<h4 class='center'>Uspesno ste porucili.</h4>";
		}
		$_SESSION['card']=array();
	}
}
}