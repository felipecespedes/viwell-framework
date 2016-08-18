<?php

class Singleton
{
	protected static $instance;

	protected static function getInstance()
	{
		if (is_null(static::$instance))
		{
			static::initialize();
		}

		return static::$instance;
	}

	protected function initialize()
	{
		static::$instance = new static();
	}

	protected function __construct() {}
	
	private function __clone() {}

	private function __wakeup() {}
}