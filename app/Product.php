<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'description', 'image', 'unit_price', 'promote_price', 'quantity'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
    public function rating()
    {
        return $this->hasMany('App\Rating');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
