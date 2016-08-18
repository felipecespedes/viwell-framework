<?php

class Sanitizer
{
	/**
	* Sanitize a view name
	*
	* @param string $name
	* @return string
	*/
	public static function sanitizeViewName($name)
	{
		$name = (strcmp($name, "/") === 0) ? $name : ltrim($name, "/");
		$name = str_replace(".", "/", $name);

		return $name;
	}
}