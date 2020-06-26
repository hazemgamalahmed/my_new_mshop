<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'date',
        'client_id',
        'user_id',
        'total_amount',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'order_details',
            'order_id',
            'product_id')
            ->withPivot(['price', 'quantity', 'total'])
            ->withTimestamps();
    }
}
