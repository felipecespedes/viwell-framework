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
chdir( dirname(__DIR__) );

// --------------------------------------------------------------
// Define the framework paths
// --------------------------------------------------------------
define("SYS_PATH", "lib/");
define("CORE_PATH", SYS_PATH."core/");
define("APP_PATH", "app/");

// --------------------------------------------------------------
// Load Bootstrap and run the app
// --------------------------------------------------------------
require CORE_PATH."Bootstrap.php";
$app = new Bootstrap();
$app->run();