<?php

namespace app\controllers;

use core\Controller;

class HomeController extends Controller
{
	/**
	* Example of an implemented method
	*/
	public function actionIndex()
	{
		return $this->view("index", ["framework" => "Viwell Framework"]);
	}
}