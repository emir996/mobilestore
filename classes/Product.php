<?php
class Product extends ActiveRecord {
	public $id,$name_brand,$name_model,$image,$price,$availability,$models_id;
	public static $table = "products";
	public static $key = "id";
}