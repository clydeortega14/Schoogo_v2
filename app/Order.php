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

    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
    public function pricing()
    {
        return $this->hasOne('App\Pricings', 'id', 'pricing_id');
    }
    public function status()
    {
        return $this->hasOne('App\OrderStatus', 'id', 'order_status_id');
    }
    public function deliverTo()
    {
        return $this->hasOne('App\DeliverAddress', 'id', 'deliver_to');
    }
}
