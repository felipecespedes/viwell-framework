<?php

namespace app\controllers;

use core\Controller;

class MainController extends Controller
{
	/**
	* Example of an implemented method
	*/
	public function index()
	{
		return $this->view("index", ["framework" => "Viwell Framework"]);
	}
}