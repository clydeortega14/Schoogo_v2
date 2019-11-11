<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'orders_status';
    protected $fillable = ['status', 'class'];
    public $timestamps = false;
}
