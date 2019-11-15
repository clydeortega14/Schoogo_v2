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
}
