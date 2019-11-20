<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricings extends Model
{
    protected $table = 'pricings';
    protected $fillable = ['product_id', 'category_id', 'size', 'quantity', 'price'];
    public $timestamps = false;

    public function data(Array $data)
    {
    	return [

    		'product_id' => $data['product_id'],
    		'category_id' => $data['category_id'],
    		'size' => $data['size'],
    		'quantity' => $data['quantity'],
    		'price' => $data['price']

    	];
    }
    public function pricingFormattedPrice()
    {
        return number_format($this->price, 2);
    }
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
    public function categories()
    {
        return $this->belongsTo('App\Categories', 'category_id', 'id');
    }
    public function sizes()
    {
        return $this->belongsTo('App\Size', 'size', 'id');
    }

}
