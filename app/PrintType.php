<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintType extends Model
{
    protected $table = 'print_types';
    protected $fillable = ['type', 'price'];
    public $timestamps = false;

    public function presentPrice()
    {
    	return number_format($this->price, 2);
    }
}
