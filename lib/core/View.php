<?php

class View
{	
	/**
	* The content of the view file
	*
	* @var string
	*/
	private $view;

	/**
	* Variables assigned to the view
	*
	* @var array
	*/
	private $assignedVars = [];

	/**
	* Create a new View instance
	*
	* @param string $viewName
	* @param string $baseDir
	* @param string $fileExtension
	*/
	public function __construct($viewName, $baseDir = null, $fileExtension = "php")
	{
		// --------------------------------------------------------------
		// Assign default base directory if null
		// --------------------------------------------------------------
		if (is_null($baseDir)) 
		{
			$baseDir = APP_PATH."/views/";
		}

		// --------------------------------------------------------------
		// Get the view path
		// --------------------------------------------------------------
		$viewPath = $baseDir.$viewName.".".$fileExtension;

		// --------------------------------------------------------------
		// Validate if exists the view file and assign the path
		// --------------------------------------------------------------
		if (file_exists($viewPath))
		{
			$this->view = $viewPath;
		}
		else
		{
			\ErrorHandler::fileNotFound($viewPath);
		}
	}

	/**
	* Add a variable to $this->assignedVars
	*
	* @param string $key
	* @param string $value
	*/
	public function addVar($key, $value)
	{
		if ( ! empty($key))
		{
			$this->assignedVars[$key] = $value;
		}
	}

	/**
	* Return the view with its values
	*/
	public function show()
	{
		// --------------------------------------------------------------
		// Create variables based on $this->assignedVars
		// --------------------------------------------------------------
		foreach ($this->assignedVars as $key => $value)
		{
			$$key = $value;
		}

		require_once $this->view;
	}

}