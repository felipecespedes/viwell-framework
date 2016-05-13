<?php

namespace app\controllers;

use core\controllers\Controller;

class MainController extends Controller
{
	public function index()
	{
		$this->render("index", ["greeting" => "Hello world!"]);
	}

}