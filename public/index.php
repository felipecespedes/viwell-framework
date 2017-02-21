<?php
/**
*	Viwell Framework - PHP framework for web development
*
*	@package Viwell
*	@version 1.0.0 Dev
*	@author Felipe Céspedes
*	@license MIT License
*/

// --------------------------------------------------------------
// Change current directory path
// --------------------------------------------------------------
chdir(dirname(__DIR__));

// --------------------------------------------------------------
// Define the framework paths
// --------------------------------------------------------------
define("SYS_PATH", "lib/");
define("CORE_PATH", SYS_PATH."core/");
define("APP_PATH", "app/");

// --------------------------------------------------------------
// Load Bootstrap
// --------------------------------------------------------------
require CORE_PATH."init.php";

// --------------------------------------------------------------
// Show errors if needed
// --------------------------------------------------------------
if (Config::get("debug")) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

// --------------------------------------------------------------
// Run the app
// --------------------------------------------------------------
$app = new App;
