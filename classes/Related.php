<?php
//Class Related with attributes from Related table in database, extending ActiveRecord class
class Related extends ActiveRecord {
	public $id,$name_brand,$name_model,$image,$price;
	public static $table = "related_products";
	public static $key = "id";
}