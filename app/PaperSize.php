<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperSize extends Model
{
    protected $table = 'paper_sizes';
    protected $fillable = ['prod_id', 'size'];
    public $timestamps = false;


    public function pricings()
    {
    	return $this->hasMany('App\Pricings', 'id');
    }
}
