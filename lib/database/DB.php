<?php

namespace lib\database;

use \Config;

class DB
{
	/**
	* Execute a database query and return a single result
	*
	* @param string $sql
	* @param array $params
	* @return array
	*/
	public static function query($sql, $params = [])
	{
		$statement = static::connection()->prepare($sql);
		$statement->execute($params);
		$result = $statement->fetch();

		return $result;
	}

	/**
	* Execute a database query and return all its results
	*
	* @param string $sql
	* @param array $params
	* @return array
	*/
	public static function queryAll($sql, $params = [])
	{
		$statement = static::connection()->prepare($sql);
		$statement->execute($params);
		$result = $statement->fetchAll();

		return $result;
	}

	/**
	* Create a new PDO instance
	*
	* @return PDO Object
	*/
	private static function connection()
	{
		$db = new \PDO("mysql:host=".Config::get("hostname").";dbname=".Config::get("database"), Config::get("username"), Config::get("password"));

		return $db;
	}
}