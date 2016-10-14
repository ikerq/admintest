<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    	'name', 'description',
    ];

    /**
     * Relacion con con los usuarios
     */
    public function user()
    {
        //hasMany porque un perfil tiene muchos usuarios
        return $this->hasMany(User::class);
    }
}
