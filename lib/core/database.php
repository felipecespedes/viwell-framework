<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
	"driver"	=> Config::get("driver"),
	"host"		=> Config::get("hostname"),
	"port"		=> Config::get("port"),
	"username"	=> Config::get("username"),
	"password"	=> Config::get("password"),
	"database"	=> Config::get("database"),
	"charset"	=> Config::get("charset"),
	"collation"	=> Config::get("collation"),
	"prefix"	=> Config::get("prefix"),
	"options"	=> [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	]
]);

$capsule->bootEloquent();
