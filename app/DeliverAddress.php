<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliverAddress extends Model
{
    //
    protected $table = 'deliver_addresses';
    protected $fillable = [

    	'firstname',
    	'lastname',
    	'email',
    	'contact',
    	'country',
    	'state',
    	'city',
    	'street'
    ];
}
