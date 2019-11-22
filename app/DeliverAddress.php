<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliverAddress extends Model
{
    //
    protected $table = 'deliver_addresses';
    protected $fillable = [

    	'complete_address', 'contact_person', 'contact_number'
    ];
}
