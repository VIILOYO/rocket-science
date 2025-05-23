<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperItem
 */
class Item extends Model
{
    use SoftDeletes;

    // Можно не указывать, но я придерживаюсь принципа "явное лучше неявного"
    protected $table = 'items';

    protected $fillable = [
        'title',
        'price',
        'amount',
    ];

    protected $casts = [
        'price' => 'float',
    ];

    public function options(): HasMany
    {
        return $this->hasMany(Option::class, 'item_id');
    }
}
