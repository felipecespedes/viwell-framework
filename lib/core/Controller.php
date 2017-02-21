<?php

namespace core;

use core\Response;

class Controller {

	protected $response;

	/**
	* Render JSON data
	*
	* @param array $data
	* @param number $statusCode
	* @param boolean $isJSON
	* @return Response object
	*/
	protected function response($data, $statusCode = null, $isJSON = null) {

		return new Response($data, $statusCode, $isJSON);
	}
}
