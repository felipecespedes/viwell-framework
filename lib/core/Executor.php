<?php

class Executor
{
	/**
	* Execute a method based on the requested route
	*
	* @param array $route
	*/
	public static function executeMethod($route)
	{
		// --------------------------------------------------------------
		// Get the controller file name
		// --------------------------------------------------------------
		$controllerName = $route["controller"];

		// --------------------------------------------------------------
		// Load the controller file
		// --------------------------------------------------------------
		Loader::load("controllers/".$controllerName);

		// --------------------------------------------------------------
		// Get the name of the controller to be executed and its method
		// --------------------------------------------------------------
		$controllerName = "app\\controllers\\".$controllerName;
		$method = $route["method"];

		// --------------------------------------------------------------
		// Instantiate the controller
		// --------------------------------------------------------------
		$controller = new $controllerName();

		// --------------------------------------------------------------
		// Validate if method exists
		// --------------------------------------------------------------
		if ( !method_exists($controller, $method) ) {
			ErrorHandler::methodNotDefined($controllerName, $method);
		}

		// --------------------------------------------------------------
		// Print the result of the executed method
		// --------------------------------------------------------------
		echo $controller->$method();

		/**
		|----------------------------------------------------------------
		|	TODO: How to work with params?
		|----------------------------------------------------------------
		*/
	}

	/**
	* Resolve the route from the given URL
	*
	* @param string $url
	*/
	public static function resolveRoute($url)
	{	
		// --------------------------------------------------------------
		// Validate if the route exists for the given URL
		// --------------------------------------------------------------
		if ( array_key_exists($url, Router::$routes) ) {
			$route = Router::$routes[$url];
		}
		else {
			ErrorHandler::routeNotFound($url);
		}

		// --------------------------------------------------------------
		// Call to execute the method of the route
		// --------------------------------------------------------------
		self::executeMethod($route);
	}
}