<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricings extends Model
{
    protected $table = 'pricings';
    protected $fillable = ['size', 'quantity', 'price'];
    public $timestamps = false;
}
