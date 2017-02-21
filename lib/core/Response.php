<?php

namespace core;

class Response {

	private $headers;

	private $data;

	private $statusCode = 200;

	private $isJSON = true;

	public function __construct($data, $statusCode = null, $isJSON = null) {

		$this->data = $data;

		if ( ! is_null($statusCode)) {

			Validator::isInteger($statusCode, "Parameter 'status code' must be an integer");

			$this->statusCode = $statusCode;
		}

		if ( ! is_null($isJSON)) {

			Validator::isBoolean($isJSON, "Parameter 'is JSON' must be a boolean");

			$this->isJSON = $isJSON;
		}

		$this->headers = [];
	}

	public function header($header) {

		array_push($this->headers, $header);

		return $this;
	}

	public function __toString() {

		http_response_code($this->statusCode);

		foreach ($this->headers as $header) {
			header($header);
		}

		if ($this->isJSON) {
			header('Content-Type: application/json');

			return json_encode($this->data);
		}

		return $this->data;
	}

}
