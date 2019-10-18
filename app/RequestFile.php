<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestFile extends Model
{
    protected $table = 'request_files';
    protected $fillable = [

    	'purpose',
    	'summary',
    	'paper_size_id',
    	'print_type_id',
    	'uploaded_file',
    	'address',
    	'name',
    	'contact_number',
    	'number_of_page',
    	'total_price'

    ];

    public function size()
    {
    	return $this->hasOne('App\PaperSize', 'id', 'paper_size_id');
    }
    public function type()
    {
    	return $this->hasOne('App\PrintType', 'id', 'print_type_id');
    }
}
