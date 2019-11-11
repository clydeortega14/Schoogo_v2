<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'papers';
    protected $fillable = ['prod_id', 'name', 'gsm', 'price'];
    public $timestamps = false;
}
