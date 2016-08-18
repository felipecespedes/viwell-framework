<?php

class App
{
	/**
	* Default controller to be executed
	*
	* @var string
	*/
	protected $controller = "HomeController";

	/**
	* Default method to be executed
	*
	* @var string
	*/
	protected $method = "actionIndex";
	
	/**
	* Default parameters
	*
	* @var array
	*/
	protected $params = [];

	/**
	* Initialize the application
	*/
	public function __construct()
	{
		$url = $this->parseUrl();

		$controllerName = ucfirst(strtolower($url[0]))."Controller";

		if (file_exists(APP_PATH."controllers/".$controllerName.".php"))
		{
			$this->controller = $controllerName;
			unset($url[0]);
		}

		require APP_PATH."controllers/".$this->controller.".php";

		$controllerName = "app\\controllers\\".$this->controller;
		$this->controller = new $controllerName;

		if (isset($url[1]))
		{
			$methodName = ucfirst(strtolower($url[1]));
			if (method_exists($this->controller, $methodName))
			{
				$this->method = $methodName;
				unset($url[1]);
			}
		}

		$this->params = $url ? array_values($url) : $this->params;

		echo call_user_func_array([$this->controller, $this->method], $this->params);
	}

	/**
	* Parse the URL
	*
	* @return string $url
	*/
	protected function parseUrl()
	{
		if (isset($_GET["url"]))
		{
			return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
		}
	}
}