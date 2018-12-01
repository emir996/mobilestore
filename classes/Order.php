<?php
class Order extends ActiveRecord {
	public $id, $name, $address;
	public static $table = "order";
	public static $key = "id"; 
}