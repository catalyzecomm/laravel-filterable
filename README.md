# Laravel Filterable

[![StyleCI](https://github.styleci.io/repos/297788666/shield?style=flat&branch=master)](https://github.styleci.io/repos/297788666?branch=master)
[![Latest Stable Version](https://poser.pugx.org/catalyzecomm/laravel-filterable/v)](//packagist.org/packages/catalyzecomm/laravel-filterable)
[![License](https://poser.pugx.org/catalyzecomm/laravel-filterable/license)](//packagist.org/packages/catalyzecomm/laravel-filterable)
[![Total Downloads](https://poser.pugx.org/catalyzecomm/laravel-filterable/downloads)](//packagist.org/packages/catalyzecomm/laravel-filterable)

This package allows you to easily handle database filtering through query strings. 

## Installation

You can install the package via composer:

for Laravel 6.x & 7.x

```bash
composer require catalyzecomm/laravel-filterable
```

## Introduction

Introduction here

### Usage
Define your model (use `Catalyzecomm\Filterable` Trait and define `$allowedFilters`)
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

Use on your controller
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
