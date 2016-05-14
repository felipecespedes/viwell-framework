<?php

class Bootstrap
{
	/**
	* Initialize the application
	*/
	public function run()
	{
		// --------------------------------------------------------------
		// Load the files Loader and the necessary files to run the app
		// --------------------------------------------------------------
		require SYS_PATH."Loader.php";
		Loader::loadInitFiles();

		// --------------------------------------------------------------
		// Get the URL
		// --------------------------------------------------------------
		$url = self::getUrl();

		// --------------------------------------------------------------
		// Call Router to resolve the route
		// --------------------------------------------------------------
		Executor::resolveRoute($url);
	}

	/**
	* Get the current url in the browser
	*
	* @return string $url
	*/
	private function getUrl()
	{
		if ( !isset($_GET["url"]) ) {
			$url = "/";
		}
		else {
			$url = $_GET["url"];
			$url = rtrim($url, "/");
		}

		return $url;
	}
}