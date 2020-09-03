<?php

namespace Koyanyaroo\Filters;


use Illuminate\Database\Eloquent\Builder;

/**
 * Class Sort
 *
 * @package Koyanyaroo\Filters
 */
class Sort extends Filter
{
    public function __construct($fieldName = null)
    {
        $this->fieldName = $fieldName;
    }

	/**
	 * @inheritDoc
	 */
    protected function applyFilter(Builder $builder)
    {
        return $builder->orderBy($this->fieldName, $this->getRequest());
    }
}
