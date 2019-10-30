<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestFile extends Model
{
    protected $table = 'request_files';
    protected $fillable = [

    	'doc_title',
    	'doc_summary',
    	'paper_size_id',
    	'print_type_id',
    	'uploaded_file',
        'user_id',
    	'number_of_page',
    	'total_price',
        'docs_status_id'
    ];

    public function size()
    {
    	return $this->hasOne('App\PaperSize', 'id', 'paper_size_id');
    }
    public function type()
    {
    	return $this->hasOne('App\PrintType', 'id', 'print_type_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function docsStatuses()
    {
        return $this->hasOne('App\DocsStatus', 'id', 'docs_status_id');
    }
}
