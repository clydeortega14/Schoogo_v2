<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'papers';
    protected $fillable = ['prod_id', 'name', 'gsm', 'price'];
    public $timestamps = false;

    public function products()
    {
    	return $this->belongsTo('App\Product', 'prod_id', 'id');
    }
    public function paperPrice()
    {
    	return number_format($this->price, 2);
    }
}
