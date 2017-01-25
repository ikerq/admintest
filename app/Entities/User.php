<?php

namespace App\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'sex', 'birth_date', 'email', 'cellphone', 'localphone', 'password', 'id_profile', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getActiveLabelAttribute()
    {
        switch ($this->active) {
            case 0:
                return '<span class="label label-danger">Inactivo</span>';
            break;
            case 1:
                return '<span class="label label-success">Activo</span>';
            break;
        }
    }

    public function getSinceDateAttribute()
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);

        return $date->format('d/m/Y');
    }

    public function getBirthDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value);

        return $date->format('d/m/Y');
    }
    /**
     * Relacion con el perfil de usuarios.
     */
    public function profile()
    {
        //belongsTo porque un usuario tiene un perfil
            return $this->belongsTo(Profile::class, 'profile_id');
        /*
         * IMPORTANTE:
         * Por defecto belongsTo asumira el foreing key con el subfijo _id es decir deberia tomar profile_id
         * Sin embargo puede recibir un segundo parámetro indicando el nombre del foreign key, en caso que sea
         * distinto a la conveción anterior ej id_profile.
         */
    }
}
