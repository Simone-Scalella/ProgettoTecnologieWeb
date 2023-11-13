<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    
    protected $table = 'user';
    protected $primaryKey = 'username';
    protected $keyType= 'string';
    public $incrementing= false;
    public $timestamps = false;
    protected $fillable = ['username','password'];
     protected $hidden = [
        'username','password', 'remember_token',
    ];

}