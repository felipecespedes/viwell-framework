<?php

namespace core;

class Response
{
	/**
	* Render a view
	*
	* @param string $viewName
	* @param array $vars
	* @return string
	*/
	public static function view($viewName, $vars = [])
	{
		// --------------------------------------------------------------
		// Sanitize the view name
		// --------------------------------------------------------------
		$viewName = \Sanitizer::sanitizeViewName($viewName);

		// --------------------------------------------------------------
		// Instantiate the View
		// --------------------------------------------------------------
		$view = new \View($viewName);

		// --------------------------------------------------------------
		// Add vars to view
		// --------------------------------------------------------------
		foreach ($vars as $key => $value)
		{
			$view->addVar($key, $value);
		}

		return $view->show();
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