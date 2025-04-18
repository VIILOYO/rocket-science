<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'options';

    protected $fillable = [
        'title',
        'value'
    ];

    public function item(): BelongsTo
    {
        // Тоже можно не указывать, но "явное лучше неявного"
        return $this->belongsTo(Item::class, 'item_id');
    }
}
