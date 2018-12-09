<?php
//Class model with attributes from model table in database, extending ActiveRecord class
class Model extends ActiveRecord {
	public $id,$name_model;
	public static $table = "models";
	public static $key = "id";
}