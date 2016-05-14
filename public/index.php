<?php
/**
*	Viwell Framework - PHP framework for web development
*	
*	@package Viwell
*	@version 1.0.0 Beta
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
define("APP_PATH", "app/");
define("SYS_PATH", "lib/core/");

// --------------------------------------------------------------
// Load Bootstrap and run the app
// --------------------------------------------------------------
require SYS_PATH."Bootstrap.php";
$app = new Bootstrap();
$app->run();