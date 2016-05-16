<?php

class ErrorHandler
{
	/**
	* Execute when a route is not found
	*
	* @param string $route
	*/
	public static function routeNotFound($route)
	{
		$message = "Error: This route was not found [ ".$route." ]. ";
		fin($message);
	}

	/**
	* Execute when a file is not found
	*
	* @param string $file
	*/
	public static function fileNotFound($file)
	{
		$message = "Error: This file was not found [ ".$file." ]. ";
		fin($message);
	}

	/**
	* Execute when a method is not defined
	*
	* @param string $controller
	* @param string $method
	*/
	public static function methodNotDefined($controller, $method)
	{
		$message = "Error: This method is not defined [ ".$method." ]. in controller [".$controller."] ";
		fin($message);
	}
}