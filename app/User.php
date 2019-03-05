<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "Usuaria",
        "Contrasena",
        "Nombre",
        "Apellido_Paterno",
        "Apellido_Materno",
        "Cargo",
        "Refugio_idRefugio"
    ];
    public $primaryKey="idUsuarias";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected  $table="Usuarias";
  
    
    public function getAuthPassword()
    {
        return $this->Contrasena;
    }
}
