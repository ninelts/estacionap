<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public function roles(){
        return $this->belongsToMany('App\Role'); //Funcion para relacionar muchos a muchos a la tabla roles
    }

/*----------------------------------------Validacion ROLES ------------------------------------------------------------------*/
    public function hasRole($role) //Funcion para validar si el usuario Tiene un Rol establecido
    {    
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }




    public function authorizeRoles($roles)    
    {

        abort_unless($this->hasRole($roles), 401);  //Funcion abort_unless lanza una excepción HTTP si una expresión booleana determinada se evalúa como false   
        return true;
    }


/*------------------------------------------------------------------------------------------------------------------------*/
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','rut','last_name','phone','born'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
