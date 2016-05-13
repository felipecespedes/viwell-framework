<?php

namespace core\controllers;

class Controller
{
	public function render($view, $vars = [])
	{
		// Adds variables based on $vars
		foreach ($vars as $key => $value) {
			$$key = $value;
		}

		require APP_PATH."views/" . $view . ".php";
	}
}