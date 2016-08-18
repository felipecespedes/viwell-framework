<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
	"driver"	=> Config::get("driver"),
	"host"		=> Config::get("hostname"),
	"username"	=> Config::get("username"),
	"password"	=> Config::get("password"),
	"database"	=> Config::get("database"),
	"charset"	=> Config::get("charset"),
	"collation"	=> Config::get("collation"),
	"prefix"	=> Config::get("prefix"),
]);

$capsule->bootEloquent();