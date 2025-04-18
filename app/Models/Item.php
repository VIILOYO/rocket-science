<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    // Можно не указывать, но я придерживаюсь принципа "явное лучше неявного"
    protected $table = 'items';

    protected $fillable = [
        'title',
        'price',
        'amount',
    ];
}
