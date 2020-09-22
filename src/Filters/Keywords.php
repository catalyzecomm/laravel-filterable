<?php

namespace Catalyzecomm\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Keywords.
 */
class Keywords extends Filter
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
        return $builder->where(function ($query) {
            collect(explode(',', $this->fieldName))->each(function ($fieldName) use ($query) {
                $query->orWhere(trim($fieldName), 'like', '%'.$this->getRequest().'%');
            });
        });
    }
}
