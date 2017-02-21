<?php

class Singleton {

	protected static $instance;

	private function __clone() {
	}

	private function __wakeup() {
	}

	protected function __construct() {
	}

	protected static function initialize() {

		static::$instance = new static();
	}

	public static function getInstance() {

		if (is_null(static::$instance)) {
			static::initialize();
		}

		return static::$instance;
	}
}
