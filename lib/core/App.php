<?php

class App
{
	/**
	* Initialize the application
	*/
	public function __construct()
	{
		$router = Router::getInstance();

		try
		{
			$response = $router->dispatch($this->parseUrl());
		}
		catch (Exception $e)
		{
			// TODO Better way to handle router errors
			$response = $e->getMessage();
		}

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
		else
		{
			return "/";
		}
	}
}
