<?php

namespace app\controllers;

use core\Controller;
use core\Response;

class HomeController extends Controller
{
	/**
	* Example of an implemented method
	*/
	public function actionIndex()
	{
		return Response::view("index", ["framework" => "Viwell Framework"]);
	}
}