<?php

namespace App\Repositories;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Eloquent\BaseRepository as PretusBaseRepository;

abstract class BaseRepository extends PretusBaseRepository
{
    /**
     * @param  class-string  $filter
     * @param  array{}  $data
     * @return $this
     */
    public function filter(string $filter, array $data): static
    {
        $builder = is_a($this->model, Builder::class) ? $this->model : $this->model->query();

        if (! class_exists($filter)) {
            throw new \TypeError('Фильтр должен быть объектом класса '.Filter::class);
        }

        /** @var Filter $filter */
        $filter = app($filter);

        $this->model = $filter->fill($data)($builder);

        return $this;
    }
}
