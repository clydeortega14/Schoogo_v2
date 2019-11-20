<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';
    protected $fillable = ['product_id', 'category_id', 'size'];
    public $timestamps = false;

    public function pricing()
    {
    	return $this->hasMany('App\Pricings', 'size', 'id');
    }
}
