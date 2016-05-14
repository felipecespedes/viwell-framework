<?php

namespace app\controllers;

use core\controllers\Controller;
use core\helpers\Response;

class MainController extends Controller
{
	/**
	* Example of an implemented method
	*/
	public function index()
	{
		return Response::view("index", ["greeting" => "Hello world!"]);
	}
}