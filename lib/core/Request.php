<?php

namespace core;

use \Singleton;

class Request extends Singleton {

	protected static $instance;

	private $body;

	private $params;

	public function __construct() {

		$method = $_SERVER["REQUEST_METHOD"];

		if ($method === "POST") {

			$this->body = $_POST;

		} else if ($method === "PUT" || $method === "DELETE") {

			parse_str(file_get_contents("php://input"), $this->body);
		}

		$this->params = $_GET;
	}

	public static function param($key) {

		$param = static::getInstance()->params;

		if (isset($param[$key])) {

			return $param[$key];
		}

		return null;
	}

	public static function params($key = null) {

		if (is_null($key)) {

			return static::getInstance()->params;
		}

		return static::param($key);
	}

	public static function body($key = null) {

		$body = static::getInstance()->body;

		if (is_null($key)) {

			return $body;
		}

		if (isset($body[$key])) {

			return $body[$key];
		}

		return null;
	}

}
