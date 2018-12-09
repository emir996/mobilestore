<?php
//Class Product with attributes from Product table in database, extending ActiveRecord class
class Product extends ActiveRecord {
	public $id,$name_brand,$name_model,$image,$price,$availability,$models_id;
	public static $table = "products";
	public static $key = "id";
}