<?php
//Class Order with attributes from order table in database, extending ActiveRecord class
class Order extends ActiveRecord {
	public $id, $name, $address;
	public static $table = "order";
	public static $key = "id"; 
}