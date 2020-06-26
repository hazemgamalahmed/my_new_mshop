<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'description',
        'image',
        'quantity',
        'price',
        'reorder_point',
    ];
}
