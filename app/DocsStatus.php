<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocsStatus extends Model
{
    protected $table = 'docs_statuses';
    protected $fillable = ['name', 'class'];
    public $timestamps = false;
}
