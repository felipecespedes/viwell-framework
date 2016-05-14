<?php

class Loader
{
	/**
	* The necessary files to run the app
	*
	* @var array
	*/
	private static $initFiles = [
		["name" => "functions", "dir" => SYS_PATH],
		["name" => "ErrorHandler", "dir" => SYS_PATH],
		["name" => "Sanitizer", "dir" => SYS_PATH],
		["name" => "Executor", "dir" => SYS_PATH],
		["name" => "Router", "dir" => SYS_PATH],
		["name" => "helpers/Response", "dir" => SYS_PATH],
		["name" => "controllers/Controller", "dir" => SYS_PATH],
		["name" => "http/routes", "dir" => APP_PATH],
	];

	/**
	* Load a file from system
	*
	* @param string $fileName
	* @param string $baseDir
	* @param string $fileExtension	
	*/
	public static function load($fileName, $baseDir = APP_PATH, $fileExtension = ".php")
	{
		$filePath = $baseDir . $fileName . $fileExtension;

		if ( file_exists($filePath) ) {
			require $filePath;
		} else {
			ErrorHandler::fileNotFound($filePath);
		}
	}

	/**
	* Load the necessary files to run the app
	*/
	public static function loadInitFiles()
	{
		foreach (self::$initFiles as $file) {
			self::load( $file["name"], $file["dir"]);
		}
	}
}