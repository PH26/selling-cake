<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'date_order', 'note', 'payment'
    ];

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
