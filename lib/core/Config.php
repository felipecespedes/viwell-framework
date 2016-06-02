<?php

class Config
{
	/**
	* Configuration values
	*
	* @var array
	*/
	private static $configs;

	/**
	* Get a configuration value
	*
	* @param string $key
	* @return string
	*/
	public static function get($key)
	{
		static::loadConfigs();
		return static::$configs[$key];
	}

	/**
	* Load the defined configuration values
	*/
	private static function loadConfigs()
	{
		if ( is_null(static::$configs) ) {
			static::$configs = Loader::loadAndReturn("config", "config/");
		}
	}
}