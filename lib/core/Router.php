<?php

class Router
{
	private static $routes = [];

	public static function get($url, $controller, $method)
	{
		$route = ["controller" => $controller, "method" => $method, "error" => false];

		$index = self::sanitizeIndex($url);

		self::$routes[$index] = $route;
	}

	public static function getActionFromUrl($url)
	{
		if ( array_key_exists($url, self::$routes) ) {
			$action = self::$routes[$url];
		}
		else {
			$action = ["controller" => "ErrorController", "method" => "index", "error" => true];
		}

		self::loadControllers($action);
	}

	private static function loadControllers($action)
	{
		$controllerName = $action["controller"];
		$method = $action["method"];
		$error = $action["error"];

		require SYS_PATH."controllers/Controller.php";

		if ( $error ) {
			require SYS_PATH."controllers/ErrorController.php";
			$controllerName = "core\\controllers\\ErrorController";
			$method = "routeNotFound";
		}
		else {
			$controllerFile = APP_PATH."controllers/" . $controllerName . ".php";
			if ( file_exists($controllerFile) ) {
				require  $controllerFile;
				$controllerName = "app\\controllers\\" . $controllerName;
			}
			else {
				require SYS_PATH."controllers/ErrorController.php";
				$controllerName = "core\\controllers\\ErrorController";
				$method = "controllerNotFound";
			}
		}

		self::executeController($controllerName, $method);
	}

	// Creates a controller and executes its method
	private function executeController($controllerName, $method, $params = null)
	{
		$controller = new $controllerName();
		if ( $params == null ) {
			$controller->$method();	
		} else {
			$controller->$method($params);
		}
	}

	private function sanitizeIndex($url)
	{
		$index = ( strcmp($url, "/") === 0 ) ? $url : ltrim($url, "/");
		$index = str_replace(".", "/", $index);

		return $index;
	}
}