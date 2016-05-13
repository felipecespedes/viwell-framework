<?php

namespace core\controllers;

class ErrorController
{
	public function routeNotFound()
	{
		echo "This route was not found";
	}

	public function controllerNotFound()
	{
		echo "The controller was not found";
	}
}