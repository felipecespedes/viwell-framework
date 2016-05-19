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
	* @param string $viewPath
	*/
	public function __construct($viewPath)
	{
		// --------------------------------------------------------------
		// Validate if exists the view file and get its content
		// --------------------------------------------------------------
		if ( file_exists($viewPath) ) {
			$this->view = file_get_contents($viewPath);	
		}
		else {
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
		if ( !empty($key) ) {
			$this->assignedVars[$key] = $value;
		}
	}

	/**
	* Return the view with its values
	*/
	public function show()
	{
		$this->replacePlaceholders();

		return $this->view;
	}

	/**
	* Replace placeholders by its values in the view
	*/
	private function replacePlaceholders()
	{
		foreach ($this->assignedVars as $key => $value) {
			$this->view = str_replace("{{".$key."}}", $value, $this->view);
		}
	}
}