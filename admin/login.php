<?php
 require '../config.php';
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);

if(!isset($_POST['tbUsername'])||!isset($_POST['tbPassword'])){
	die("Invalid parameters!");
}

$username = $_POST['tbUsername'];
$password = $_POST['tbPassword'];
$username = str_replace("'","",$username);
$username = str_replace("-","",$username);
$password = str_replace("'","",$password);
$password = str_replace("-","",$password);

$user = User::login($username,$password);


if($user){
	header("location: index.php");
}else{
	echo "Invalid user, sorry!";
}
