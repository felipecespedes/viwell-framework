# Viwell Framework

PHP framework for REST services.

## Quick start

Clone/Download this repo inside `htdocs` folder for [Xampp](https://www.apachefriends.org/index.html) or `www` folder for [Wamp](http://www.wampserver.com/en/) and then install its dependencies with [Composer](https://getcomposer.org/).

```bash
# clone this repo
$ git clone https://github.com/viwell/viwell-framework.git viwell-framework

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
	|   ├── controllers     # App controllers folder
	|	├── http
	|	|	└── routes.php  # File for routes
	|	└── models          # App models folder
    ├── config
	|	└── config.php      # File for configurations
    ├── lib                 # Folder for framework core files
    ├── public              # Folder for public files
    ├── LICENSE
    ├── README.md
	└── composer.json       # Composer file
	
## Getting Started

### Configuration file

Define app configurations in [config.php](config/config.php)

```PHP
return [
	"driver"	=> "mysql",
	"hostname"	=> "localhost",
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
Router::put("/users/", "UserController", "update");
Router::delete("/users/", "UserController", "destroy");
```

### Controllers

`// TODO`

### Models

Models use [Eloquent](https://laravel.com/docs/5.2/eloquent)

### Requests

`// TODO`

### Responses

`// TODO`

## Authors

* **Felipe Céspedes** - *felipecespedespisso@gmail.com* - [Viwell](https://github.com/viwell)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE) file for details
