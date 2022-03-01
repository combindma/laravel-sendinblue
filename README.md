# Laravel Seninblue

[![Latest Version on Packagist](https://img.shields.io/packagist/v/combindma/laravel-sendinblue.svg?style=flat-square)](https://packagist.org/packages/combindma/laravel-sendinblue)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/combindma/laravel-sendinblue/run-tests?label=tests)](https://github.com/combindma/laravel-sendinblue/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/combindma/laravel-sendinblue/Check%20&%20fix%20styling?label=code%20style)](https://github.com/combindma/laravel-sendinblue/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/combindma/laravel-sendinblue.svg?style=flat-square)](https://packagist.org/packages/combindma/laravel-sendinblue)

Manage newsletters in Laravel with Sendinblue

## Installation

You can install the package via composer:

```bash
composer require combindma/laravel-sendinblue
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="sendinblue-config"
```

This is the contents of the published config file:

```php
return [
    /*
   * Enable or disable Sendinblue. Useful for local development when running tests.
   */
    'api_enabled' => env('SENDINBLUE_ENABLED', false),

    /*
     * The API key of a Sendinblue account.
     */
    'apiKey' => env('SENDINBLUE_APIKEY'),

    /*
     * The default Ids of the lists to add the contact to when no listIds has been specified in a method.
     */
    'defaultListIds' => [
        2,
    ]
];
```

## Usage

Subscribing an email address can be done like this:

```php
Sendinblue::subscribe('email@email.com');
```

You can pass some merge variables as the second argument:

```php
Sendinblue::subscribe('email@email.com', ['FNAME'=>'Rince', 'LNAME'=>'Wind'];
```

You can subscribe someone to a specific list ID by using the third argument:

```php
Sendinblue::subscribe('email@email.com', ['FNAME'=>'Rince', 'LNAME'=>'Wind'], [2]);
```

Unsubscribing an email address can be done like this:

```php
Sendinblue::unsubscribe('email@email.com');
```

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Combind](https://github.com/combindma)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
