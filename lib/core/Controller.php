<?php

namespace core;

use Windwalker\Renderer\BladeRenderer;

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
		$renderer = new BladeRenderer([APP_PATH."views"], ["cache_path" => "cache"]);

		return $renderer->render($view, $data);
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