<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    
    protected $table = 'user';
    protected $_primary = 'username';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['username','password'];
    protected $hidden = [
        'username','password', 'remember_token',
    ];

}