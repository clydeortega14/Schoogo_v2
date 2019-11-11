<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'image', 'status'];


    public function sizes()
    {
    	return $this->hasMany('App\PaperSize', 'prod_id');
    }
    public function paper_types()
    {
    	return $this->hasMany('App\Paper', 'prod_id');
    }

}
