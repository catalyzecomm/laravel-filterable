<?php

namespace Koyanyaroo\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Active
 *
 * @package Koyanyaroo\Filters
 */
class Active extends Filter
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
        return $builder->where($this->getFieldName(), $this->getRequest());
    }
}
