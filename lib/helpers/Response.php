<?php

namespace lib\helpers;

class Response
{
	/**
	* Render a view
	*
	* @param string $view
	* @param array $vars
	* @return string
	*/
	public static function view($view, $vars = [])
	{
		/**
		|----------------------------------------------------------------
		|	TODO: How to work with view vars?
		|----------------------------------------------------------------
		|
		|	foreach ($vars as $key => $value) {
		|		$$key = $value;
		|	}
		*/
		
		// --------------------------------------------------------------
		// Sanitize the view name
		// --------------------------------------------------------------
		$view = \Sanitizer::sanitizeViewName($view);

		// --------------------------------------------------------------
		// Get the file name
		// --------------------------------------------------------------
		$viewName = APP_PATH."views/".$view.".php";

		// --------------------------------------------------------------
		// Validate if exists the view file and get its content
		// --------------------------------------------------------------
		if ( file_exists($viewName) ) {
			$viewContent = file_get_contents($viewName);	
		}
		else {
			\ErrorHandler::fileNotFound($viewName);
		}
		
		return $viewContent;
	}

	/**
	* Render JSON data
	*
	* @param array $data
	* @return json
	*/
	public static function json($data)
	{
		return json_encode($data);
	}
}