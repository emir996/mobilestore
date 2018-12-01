<?php
class Model extends ActiveRecord {
	public $id,$name_model;
	public static $table = "models";
	public static $key = "id";
}