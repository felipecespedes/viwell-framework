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
		$router = Router::getInstance();

		$response = $router->dispatch($this->parseUrl());

		echo $response;
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
			return filter_var(rtrim($_GET["url"]), FILTER_SANITIZE_URL);
		}
		else {
			return "/";
		}
	}
}