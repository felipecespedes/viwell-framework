<?php

class Router
{
	/**
	* Application routes
	*
	* @var array
	*/
	public static $routes = [];

	/**
	* Add a route to the application
	*
	* @param string $url
	* @param string $controller
	* @param string $method
	*/
	public static function add($url, $controller, $method)
	{
		$route = ["controller" => $controller, "method" => $method];

		$url = Sanitizer::sanitizeViewName($url);

		self::$routes[$url] = $route;
	}
}