<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'image', 'status'];


    public function categories()
    {
        return $this->hasMany('App\Categories', 'product_id');
    }
    public function paper_types()
    {
    	return $this->hasMany('App\Paper', 'prod_id');
    }
    public function pricings()
    {
        return $this->hasMany('App\Pricings', 'product_id', 'id');
    }
}
