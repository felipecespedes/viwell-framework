<?php
/**
*	Viwell Framework - PHP framework for REST services
*
*	@package Viwell
*	@version 0.1.0
*	@author Felipe Céspedes
*	@license MIT License
*/

// --------------------------------------------------------------
// Change current directory path
// --------------------------------------------------------------
chdir(dirname(__DIR__));

// --------------------------------------------------------------
// Define framework paths
// --------------------------------------------------------------
define("SYS_PATH", "lib/");
define("CORE_PATH", SYS_PATH . "core/");
define("APP_PATH", "app/");

// --------------------------------------------------------------
// Load objects
// --------------------------------------------------------------
require CORE_PATH . "Autoloader.php";
new Autoloader();

// --------------------------------------------------------------
// Run application
// --------------------------------------------------------------
new App();
