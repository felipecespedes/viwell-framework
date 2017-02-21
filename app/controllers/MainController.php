<?php

namespace app\controllers;

use core\Controller;

class MainController extends Controller {

	/**
	* Example of an implemented method
	*/
	public function index() {

		return $this->response(["message" => "Welcome to Viwell Framework"]);
	}
}
