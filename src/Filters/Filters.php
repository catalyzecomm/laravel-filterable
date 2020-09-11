<?php

namespace Koyanyaroo\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

/**
 * Class Filter.
 */
abstract class Filter
{
    /**
     * @var
     */
    protected $fieldName;

    /**
     * Handling each pipe to execute this method.
     *
     * @param $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Request::has($this->getRequestKey()) || $this->getRequest() == null) {
            return $next($request);
        }

        return $this->applyFilter($next($request));
    }

    /**
     * An abstract method that will be implemented on concrete class.
     *
     * @param $builder
     *
     * @return mixed
     */
    abstract protected function applyFilter(Builder $builder);

    /**
     * Get request key as per class base name
     * eg: Sort -> 'sort'
     *     FooBar -> 'foo_bar'.
     *
     * @return string
     */
    protected function getRequestKey()
    {
        return Str::snake(class_basename($this));
    }

    /**
     * Get the value as per request key.
     *
     * @return array|\Illuminate\Http\Request|string
     */
    protected function getRequest()
    {
        return Request::query($this->getRequestKey());
    }

    /**
     * Get the column name on database to associate with the query.
     *
     * @return string
     */
    protected function getFieldName()
    {
        if ($this->fieldName) {
            return $this->fieldName;
        }

        return Str::snake(class_basename($this));
    }
}
