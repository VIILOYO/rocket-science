<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QBuilder;

class ItemFilter extends Filter
{
    /** @var array<string, array{int, string}>|null  */
    public ?array $properties = null;

    public function properties(Builder|QBuilder $builder): Builder|QBuilder
    {
        return $builder->where(function (Builder $query) {
            foreach ($this->properties as $title => $values) {
                $query->whereHas('options', function (Builder $q) use ($title, $values) {
                    $q->where('title', $title)
                        ->whereIn('value', (array)$values);
                });
            }
        });
    }
}
