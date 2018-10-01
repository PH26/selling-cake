<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'star'
    ];

    public function products()
    {
        return $this->belongsTo('App\Product');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
