# Readme

[![Build Status](https://travis-ci.org/Ridrog-de/laravel-bulma.svg?branch=master)](https://travis-ci.org/Ridrog-de/laravel-bulma)
[![Latest Stable Version](https://poser.pugx.org/ridrog/laravel-bulma/v/stable)](https://packagist.org/packages/ridrog/laravel-bulma)
[![Total Downloads](https://poser.pugx.org/ridrog/laravel-bulma/downloads)](https://packagist.org/packages/ridrog/laravel-bulma)
[![Latest Unstable Version](https://poser.pugx.org/ridrog/laravel-bulma/v/unstable)](https://packagist.org/packages/ridrog/laravel-bulma)
[![License](https://poser.pugx.org/ridrog/laravel-bulma/license)](https://packagist.org/packages/ridrog/laravel-bulma)

 **[Full Documentation](https://ridrog-de.github.io/laravel-bulma/)**

## What is this



-----------------------------------------------
## Installation

```
composer require ridrog/bulma-auth
```

#### Laravel 5.5
nothing more to do, thanks to package auto discovery

#### \> Laravel 5.5

add the Service Provider to app/config.php
```
Ridrog\Bulma\BulmaServiceProvider::class,
```

-----------------------------------------------
## Usage

#### Command: bulma:preset

Adds bulma and font-awesome to the package.json file.  
It also overrides app.scss and _variables.scss with bulma specific versions.

```
php artisan bulma:preset
```

#### Command: bulma:auth

1. It calls bulma:preset
2. Create all views and Controller, just like make:auth

```
php artisan bulma:auth
```

-----------------------------------------------
## Config

-----------------------------------------------
## Details

### Commands
1. bulma:preset
2. bulma:auth
3. bulma:view NameOfTheView
4. bulma:example NameOfTheExample

### Views

- Login
- Register
- Password/Email
- Password/Rest
- Home
- Welcome

### Partials

- Pagination

### Components





-----------------------------------------------
## Tests

-----------------------------------------------

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

$ composer test

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email mail@ridrog.de instead of using the issue tracker.

## Credits



## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
