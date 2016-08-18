<?php

namespace core;

class Controller
{
	public function actionIndex()
	{
		return "Default Index";
	}
	
	/**
	* Render a view
	*
	* @param string $view
	* @param array $data
	* @return string
	*/
	protected function view($view, $data = [])
	{
		// --------------------------------------------------------------
		// Sanitize the view name
		// --------------------------------------------------------------
		$view = \Sanitizer::sanitizeViewName($view);

		// --------------------------------------------------------------
		// Instantiate the View
		// --------------------------------------------------------------
		$view = new \View($view);

		// --------------------------------------------------------------
		// Add data to view
		// --------------------------------------------------------------
		foreach ($data as $key => $value)
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
	protected function json($data)
	{
		return json_encode($data);
	}
}