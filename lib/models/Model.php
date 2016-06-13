<?php

namespace lib\models;

use lib\database\DB;

class Model
{	
	/**
	* The models' database table
	*
	* @var string
	*/
	protected $table;

	/**
	* The models' primary key field
	*
	* @var string
	*/
	protected $primaryKey = "id";

	/**
	* Create a new Model instance
	*/
	public function __construct()
	{
		
		// --------------------------------------------------------------
		// By reflection get the name of the model table
		// The default value is the class name, all lowercase
		// --------------------------------------------------------------	
		if ( is_null($this->table) )
		{
			$reflection = new \ReflectionClass($this);
			$this->table = strtolower($reflection->getShortName());
		}

		// --------------------------------------------------------------
		// Load the model structure
		// --------------------------------------------------------------
		$this->loadModelStructure();
	}

	/**
	* Load a model by its primary key field
	*
	* @param string $id
	* @return Model Object
	*/
	public static function find($id)
	{
		// --------------------------------------------------------------
		// Instanciate the current model
		// --------------------------------------------------------------
		$model = new static();

		// --------------------------------------------------------------
		// Execute the database query
		// --------------------------------------------------------------
		$sql = "select * from ".$model->table." where ".$model->primaryKey." = :id";
		$params = ["id" => $id];
		$result = DB::query($sql, $params);

		// --------------------------------------------------------------
		// Validate the result and build the model
		// --------------------------------------------------------------
		if ( !empty($result) )
		{
			foreach ($result as $key => $value)
			{
				$model->$key = $value;
			}
		}

		return $model;
	}

	/**
	* Load the current model structure
	*/
	private function loadModelStructure()
	{	
		// --------------------------------------------------------------
		// Execute the database query
		// --------------------------------------------------------------
		$sql = "select column_name from information_schema.columns where table_schema = :table_schema and table_name = :table_name";
		$params = ["table_schema" => \Config::get("database"), "table_name" => $this->table];
		$result = DB::queryAll($sql, $params);

		// --------------------------------------------------------------
		// Validate the result and build the model structure
		// --------------------------------------------------------------
		if ( !empty($result) )
		{
			foreach ($result as $key => $value)
			{
				$this->{$value["column_name"]} = null;
			}
		}
	}
}