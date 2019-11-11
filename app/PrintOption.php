<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintOption extends Model
{
    protected $table = 'print_options';
    protected $fillable = ['option', 'price'];
    public $timestamps = false;
}
