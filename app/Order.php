<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['or_number', 'product_id', 'pricing_id', 'paper_id', 'finishing_touches_id', 'front', 'back', 'file', 'price'];
}
