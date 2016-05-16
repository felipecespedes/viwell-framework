<?php

namespace app\controllers;

use lib\controllers\Controller;
use lib\helpers\Response;

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