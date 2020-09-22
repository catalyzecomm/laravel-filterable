<?php

namespace Catalyzecomm\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Active.
 */
class Active extends Filter
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
        return $builder->where($this->getFieldName(), $this->getRequest());
    }
}
