<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'name', 'description', 'route', 'has_child', 'parent', 'active', 'order', 'icon',
    ];
}
