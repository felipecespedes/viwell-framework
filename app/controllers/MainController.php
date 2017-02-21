<?php

namespace app\controllers;

use core\Controller;
use core\Response;

class MainController extends Controller {

	/**
	* Example of an implemented method
	*/
	public function index() {

		return Response::json(["message" => "Welcome to Viwell Framework"]);
	}
}
