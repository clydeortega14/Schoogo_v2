<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';
    protected $fillable = ['product_id', 'category_id', 'size'];
    public $timestamps = false;

    public function products()
    {
    	return $this->belongsTo('App\Product', 'product_id', 'id');
    }
    public function categories()
    {
    	return $this->belongsTo('App\Categories', 'category_id', 'id');
    }
    public function pricing()
    {
    	return $this->hasMany('App\Pricings', 'size', 'id');
    }
}
