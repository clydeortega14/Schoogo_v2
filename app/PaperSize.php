<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperSize extends Model
{
    protected $table = 'paper_sizes';
    protected $fillable = ['size', 'price'];
    public $timestamps = false;

    public function presentPrice()
    {
    	return number_format($this->price, 2);
    }
}
