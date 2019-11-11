<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishingTouch extends Model
{
    protected $table = 'finishing_touches';
    protected $fillable = ['prod_id', 'name', 'price'];
    public $timestamps = false;
}
