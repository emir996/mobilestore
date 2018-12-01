<?php
define("DB","mobilestore");
define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("APP_DIR","c:/xampp/htdocs/mobilestore");

function __autoload($class){
	require_once APP_DIR . "/classes/".$class.".php";
}