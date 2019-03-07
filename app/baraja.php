<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class baraja extends Model
{
    protected  $primaryKey="id";
    protected  $table="baraja";
    public $timestamps=false;
    public $fillable=["nombre","numero"];
    
}
