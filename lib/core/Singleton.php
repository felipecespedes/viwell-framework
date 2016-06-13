<?php

class Singleton
{
	private static $instance;

	protected static function getInstance()
	{
		if ( self::$instance == null )
		{
			self::$instance = new static();
		}

		return self::$instance;
	}

	private function __construct() {}
	
	private function __clone() {}

	private function __wakeup() {}
}