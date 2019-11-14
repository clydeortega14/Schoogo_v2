<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
    	'or_number', 
    	'product_id', 
    	'pricing_id', 
    	'paper_id', 
    	'file', 
    	'price', 
    	'deliver_to',
    	'order_status_id'
    ];
}
