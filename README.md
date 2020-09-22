# Laravel Filterable

[![StyleCI](https://github.styleci.io/repos/292645607/shield?style=flat&branch=master)](https://github.styleci.io/repos/292645607?branch=master)

This package allows you to easily handle database filtering through query strings. 

## Installation

You can install the package via composer:

for Laravel 7.x

```bash
composer require catalyzecomm/laravel-filterable
```

for Laravel 6.x

```bash
composer require catalyzecomm/laravel-filterable:^0.0.3
```

## Introduction

Introduction here

### Usage
Define your model
```php
    use Catalyzecomm\Filterable;

    ...

    /**
     * Define an array of filter that allowed to use for this model
     * `key` as class name and `value` as field name(s)
     *
     * @var array
     */
    protected static $allowedFilters = [
        Catalyzecomm\Filters\Sort::class => 'created_at',
        Catalyzecomm\Filters\Keywords::class => 'name,email',
    ];
```

Use on you controller
```php
    $users = User::filterPaginate();
```
or 
```php
    $users = User::filterAll();
```

## Credits

- [catalyzecomm](https://github.com/catalyzecomm)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
