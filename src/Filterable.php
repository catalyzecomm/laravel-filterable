<?php

namespace Koyanyaroo;

use Illuminate\Pipeline\Pipeline;

/**
 * Trait Filterable
 *
 * @package Koyanyaroo
 */
trait Filterable
{
	/**
	 * Get the all/limited data after applying filter
	 *
	 * @param int $limit
	 * @return mixed
	 */
    public static function filterAll($limit = 20)
    {
        return static::prepareQuery()->take($limit)->get();
    }

	/**
	 * Get the paginated data after applying filter
	 *
	 * @param int $limit
	 * @return mixed
	 */
    public static function filterPaginate($limit = 20)
    {
        return static::prepareQuery()->paginate($limit);
    }

	/**
	 * Preparing query, it use pipeline to dynamically execute the query
	 *
	 * @return mixed
	 */
    protected static function prepareQuery()
    {
        return (new Pipeline())
            ->send(static::query())
            ->through(static::publishFilters())
            ->thenReturn();
    }

	/**
	 * Will generate the defined filters on the model
	 *
	 * @see $allowedFilters
	 * @return array
	 */
    protected static function publishFilters()
    {
        return collect(static::$allowedFilters)->map(function ($fieldName, $filterClass) {
            return new $filterClass(is_array($fieldName) ? implode(',', $fieldName) : $fieldName);
        })->toArray();
    }
}
