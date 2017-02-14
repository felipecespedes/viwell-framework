<?php

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

class Router extends Singleton
{
	protected static $instance;
	private $router;

	protected static function initialize()
	{
		static::$instance = new static();
		static::$instance->router = new RouteCollector();
	}

	public static function get($route, $controller, $method)
	{
		$instance = static::getInstance();

		$instance->router->get($route, ["app\\controllers\\".$controller, $method]);
	}

	public static function post($route, $controller, $method)
	{
		$instance = static::getInstance();

		$instance->router->post($route, ["app\\controllers\\".$controller, $method]);
	}

	public static function delete($route, $controller, $method)
	{
		$instance = static::getInstance();

		$instance->router->delete($route, ["app\\controllers\\".$controller, $method]);
	}

	public static function put($route, $controller, $method)
	{
		$instance = static::getInstance();

		$instance->router->put($route, ["app\\controllers\\".$controller, $method]);
	}

	public static function patch($route, $controller, $method)
	{
		$instance = static::getInstance();

		$instance->router->patch($route, ["app\\controllers\\".$controller, $method]);
	}

	public function dispatch($url)
	{
		$dispatcher = new Dispatcher($this->router->getData());

		return $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
	}
}
