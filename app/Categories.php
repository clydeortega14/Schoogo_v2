<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['product_id', 'name', 'description', 'image'];

    public function data(Array $data, $image)
    {
    	return [

    		'product_id' => $data['product_id'],
    		'name' => $data['name'],
    		'description' => $data['description'],
    		'image' => $image,
    	];
    }
    public function sizes()
    {
        return $this->hasMany('App\Size', 'category_id', 'id');
    }
}
