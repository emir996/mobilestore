<?php
 require '../config.php';
$conn = Database::getInstance(); //Instantiate Database class and connecting
//Checking Post parameters
if(!isset($_POST['tbUsername'])||!isset($_POST['tbPassword'])){
	die("Invalid parameters!");
}
//Setting values
$username = $_POST['tbUsername'];
$password = $_POST['tbPassword'];
$username = str_replace("'","",$username);
$username = str_replace("-","",$username);
$password = str_replace("'","",$password);
$password = str_replace("-","",$password);

//Instantiate class User and login method
$user = User::login($username,$password);

//Check user
if($user){
	header("location: index.php");
}else{
	echo "Invalid user, sorry!";
}
