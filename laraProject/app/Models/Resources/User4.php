<?php

namespace App\Models\Resources;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User4 extends Authenticatable{

	use Notifiable;
    
    protected $table = 'user4';
    protected $primaryKey = 'username';
    public $timestamps = false;
    
    public $incrementing = false;
    protected $keyType = 'string';
    //protected $fillable = ['username','tipo_societa','nome_organizzazione'];
    //protected $hidden = [
    //    'username','nome_organizzazione', 'remember_token',
    //];

}