# Viwell Framework

PHP framework for REST services.

## Quick start

Clone/Download this repo inside `htdocs` folder for [Xampp](https://www.apachefriends.org/index.html) or `www` folder for [Wamp](http://www.wampserver.com/en/) and then install its dependencies with [Composer](https://getcomposer.org/).

```bash
# clone this repo
$ git clone https://github.com/felipecespedes/viwell-framework.git viwell-framework

# change directory to your app
$ cd viwell-framework

# install dependencies with composer
$ composer install
```

Navigate to [localhost/viwell-framework/public/](http://localhost/viwell-framework/public/) and if everything goes well you should get a welcome message like this:

```json
{"message":"Welcome to Viwell Framework"}
```

> If you are not using [Xampp](https://www.apachefriends.org/index.html) nor [Wamp](http://www.wampserver.com/en/) make sure to put the framework folder in place where your PHP server can reach it and adjust the url based on your server configurations.

### Prerequisites

* PHP >= 5.4
* PDO PHP Extension
* mod_rewrite enabled
* [Composer](https://getcomposer.org/)

## Folder Structure

	.
	├── app
	|   ├── controllers		# Folder for controllers
	|	├── http
	|	|	└── routes.php	# File for routes
	|	└── models		# Folder for models
    ├── config
	|	└── config.php		# File for configurations
    ├── lib				# Folder for framework core files
    ├── public			# Folder for public files
    ├── LICENSE
    ├── README.md
	└── composer.json		# Composer file
	
## Getting Started

### Configuration file

Define app configurations in [config.php](config/config.php)

```PHP
return [
	"driver"	=> "mysql",
	"hostname"	=> "localhost",
	"port"		=> 3306,
	"database"	=> "test",
	"username"	=> "username",
	"password"	=> "password",
	"charset"	=> "utf8",
	"collation"	=> "utf8_unicode_ci",
	"prefix"	=> "",
	"debug"		=> true
];
```

### Defining app routes

In [routes.php](app/http/routes.php) you can define app routes that respond to different HTTP requests.

```PHP
Router::get("/users/", "UserController", "index");
Router::get("/users/{id}", "UserController", "show");
Router::post("/users/", "UserController", "create");
Router::put("/users/{id}", "UserController", "update");
Router::delete("/users/{id}", "UserController", "delete");
```

### Controllers

Controllers go inside the `app/controllers` folder.

Let's create a basic controller which uses the above defined routes:

```PHP
<?php

namespace app\controllers;

use core\Controller;
use core\Response;
use core\Request;
use app\models\User;

class UserController extends Controller {

	public function index() {

		$users = User::all();

		return Response::json($users);
	}

	public function show($id) {

		$user = User::find($id);

		if ( ! is_null($user)) {

			return Response::json($user);

		} else {

			return Response::json([
				"message" => "user does not exists"
			], 400);

		}

	}

	public function create() {

		$user = new User();

		$user->name = Request::body("name");
		$user->age = Request::body("age");
		$user->email = Request::body("email");

		try {
			$user->save();

			return Response::json([
				"message" => "user successfully created",
				"user_id" => $user->id
			]);

		} catch (\Exception $e) {

			return Response::json([
				"message" => "user could not be created"
			], 400);

		}

	}

	public function update($id) {

		$user = User::find($id);

		$user->name = Request::body("name");
		$user->age = Request::body("age");
		$user->email = Request::body("email");

		try {
			$user->save();

			return Response::json([
				"message" => "user successfully updated"
			]);

		} catch (\Exception $e) {

			return Response::json([
				"message" => "user could not be updated"
			], 400);

		}

	}

	public function delete($id) {

		$user = User::find($id);

		try {
			$user->delete();

			return Response::json([
				"message" => "user successfully deleted"
			]);

		} catch (\Exception $e) {

			return Response::json([
				"message" => "user could not be deleted"
			], 400);

		}

	}

}
```

### Models

Models go inside the `app/models` folder.

Models use [Eloquent](https://laravel.com/docs/5.2/eloquent)

### Requests

#### Query string

To retrieve data given in a query string parameter, use:

```PHP
$name = Request::param("name");
```
To retrieve all the data given in the query string parameters as an associative array, use

```PHP
$params = Request::params();
```

#### Request body

To retrieve data given in the request body, use:

```PHP
$name = Request::body("name");
```

#### Headers

To retrieve data given in a header, use:

```PHP
$auth = Request::header("Authorization");
```

To retrieve all the data given in the headers as an associative array, use

```PHP
$headers = Request::headers();
```


### Responses

**Response::json**

Outputs a response with JSON formatted data, it takes 2 parameters:

- **$data** Data that can be converted into JSON format. required: true
- **$statusCode** Response status code. type: int | required: false | default: 200

```PHP
public function index() {

	$data = ["message" => "Welcome to Viwell Framework"];

	return Response::json($data, 200);
}
```

Results in:

```json
{"message":"Welcome to Viwell Framework"}
```

**Response::header**

Adds headers to the HTTP response, it takes 1 parameter:

- **$header** The header to be added. type: string | required: true

```PHP
public function index() {

	$users = User::all();

	return Response::json($users)
		->header("Allow: GET")
		->header("Access-Control-Allow-Origin: *");
}
```

**Response::withHeaders**

Adds an array of headers to the HTTP response, it takes 1 parameter:

- **$headers** The headers to be added. type: string[] | required: true

```PHP
public function index() {

	$users = User::all();

	return Response::json($users)
		->withHeaders(["Allow: GET", "Access-Control-Allow-Origin: *"]);
}
```

**Response::response**

Outputs a response of any kind, could be used to outputs HTML responses, it takes 3 parameters:

- **$data** Outputted data. required: true
- **$statusCode** Response status code. type: int | required: false | default: 200
- **$isJSON** Whether the response is JSON or not. type: boolean | required: false | default: true

```PHP
public function index() {

	$html = "
		<html>
			<head></head>
			<body>
				<h1>Hello World</h1>
			</body>
		</html>
	";

	return Response::response($html, 200, false);
}
```

## Authors

* **Felipe Céspedes** - *felipecespedespisso@gmail.com* - [felipecespedes](https://github.com/felipecespedes)

If you found this project helpful and want to sponsor me for creating and sharing more educational open-source projects, please consider buying me a cup of coffee

<a href="https://www.buymeacoffee.com/felipecespedes" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/lato-red.png" alt="Buy Me A Coffee" height="41" width="174"></a>

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
