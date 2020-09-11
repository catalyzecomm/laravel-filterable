<?php

namespace Koyanyaroo\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Sort.
 */
class Sort extends Filter
{
    public function __construct($fieldName = null)
    {
        $this->fieldName = $fieldName;
    }

    /**
     * {@inheritdoc}
     */
    protected function applyFilter(Builder $builder)
    {
        return $builder->orderBy($this->fieldName, $this->getRequest());
    }
}
