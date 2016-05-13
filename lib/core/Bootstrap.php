<?php

class Bootstrap
{
	public function run()
	{
		$url = self::resolveURL();

		self::resolveAction($url);
	}

	private function resolveURL()
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

	private function resolveAction($url)
	{
		require SYS_PATH."Router.php";
		require APP_PATH."http/routes.php";

		Router::getActionFromUrl($url);
	}
}