<?php

namespace App\Models\Resources;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User2 extends Authenticatable{

	use Notifiable;
    
    protected $table = 'user2';
    protected $primaryKey = 'username';
    public $timestamps = false;
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['username','nome','cognome','via_residenza','numero_civ','citta','data_nascita'];
    protected $hidden = ['username','nome','cognome','via_residenza','numero_civ','citta','data_nascita'];

}