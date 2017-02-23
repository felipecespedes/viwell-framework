# Viwell Framework

PHP framework for REST services.

## Quick start

Clone/Download this repo inside `htdocs` folder for [Xampp](https://www.apachefriends.org/index.html) or `www` folder for [Wamp](http://www.wampserver.com/en/) and then install its dependencies with [Composer](https://getcomposer.org/).

```bash
# clone this repo
$ git clone https://github.com/viwell/viwell-framework.git viwell-framework

# change directory to your app
$ cd viwell-framework

# Install dependencies with composer
$ composer install
```

Then navigate to [localhost/viwell-framework](http://localhost/viwell-framework) and if everything goes well you should get a welcome message like this:
```
{"message":"Welcome to Viwell Framework"}
```

> If you are not using [Xampp](https://www.apachefriends.org/index.html) nor [Wamp](http://www.wampserver.com/en/) make sure to put the framework folder in place where your PHP server can reach it and adjust the url based on your server configurations.

### Prerequisites

* PHP >= 5.4
* PDO PHP Extension
* mod_rewrite enabled
* [Composer](https://getcomposer.org/)

## Authors

* **Felipe Céspedes** - *felipecespedespisso@gmail.com* - [Viwell](https://github.com/viwell)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
