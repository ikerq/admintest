<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
    	'name','description','route','has_child','parent','active','order','icon',
    ];
}
