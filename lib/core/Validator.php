<?php

namespace core;

class Validator {

	public static function error($errorMessage, $statusCode = 500) {
		\fin($errorMessage, $statusCode);
	}

	public static function isBoolean($value, $errorMessage) {
		if ( ! is_bool($value)) {
			static::error($errorMessage);
		}
	}

	public static function isInteger($value, $errorMessage) {
		if ( ! is_integer($value)) {
			static::error($errorMessage);
		}
	}

}
