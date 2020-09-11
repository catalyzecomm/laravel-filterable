# Laravel Filterable

[![StyleCI](https://github.styleci.io/repos/292645607/shield?style=flat&branch=master)](https://github.styleci.io/repos/292645607?branch=master)

After watching [Laravel 6 Advanced - e7 - Repository Pattern](https://www.youtube.com/watch?v=93ZhGkFIwbA&t=751s)
I decide to make my internal Filterable package, in order to be able to reused the package in my internal projects
This package allows you to easily handle database filtering through query strings. 

## Installation

You can install the package via composer:

for Laravel 7.x

```bash
composer require koyanyaroo/laravel-filterable
```

for Laravel 6.x

```bash
composer require koyanyaroo/laravel-filterable:^0.0.3
```

## Introduction

Introduction here

### Usage
Define your model
```php
    use Koyanyaroo\Filterable;

    ...

    /**
     * Define an array of filter that allowed to use for this model
     * `key` as class name and `value` as field name(s)
     *
     * @var array
     */
    protected static $allowedFilters = [
        Koyanyaroo\Filters\Sort::class => 'created_at',
        Koyanyaroo\Filters\Keywords::class => 'name,email',
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

- [koyan](https://github.com/koyanyaroo)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
