<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QBuilder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

abstract class Filter
{
    /**
     * @param  array<string|mixed>  $data
     * @param  array<string|string>  $map
     */
    public static function make(Builder|QBuilder $builder, array $data, array $map = []): Builder|QBuilder
    {
        $data = array_filter($data, fn ($value) => is_array($value) ? ! empty($value) : ! is_null($value));

        $filter = App::make(static::class);
        $filter->fill($data, $map);

        return $filter($builder);
    }

    /**
     * @param  array<string|mixed>  $data
     * @param  array<string|string>  $map
     */
    public function fill(array $data, array $map = []): static
    {
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $map)) {
                $key = $map[$key];
            }

            if (property_exists(static::class, $key)) {
                $this->{$key} = $value;
            }
        }

        return $this;
    }

    public function __invoke(Builder|QBuilder $builder): Builder|QBuilder
    {
        $methods = get_class_methods(static::class);

        foreach ($methods as $method) {
            $properties = explode('And', $method);
            $isPropertiesInit = true;
            $values = [];

            foreach ($properties as $property) {
                $property = Str::snake($property);

                if (! isset($this->{$property})) {
                    $isPropertiesInit = false;
                } else {
                    $values[] = $this->{$property};
                }
            }

            if ($isPropertiesInit) {
                $builder = $this->{$method}($builder, ...$values);
            }
        }

        return $builder;
    }
}
