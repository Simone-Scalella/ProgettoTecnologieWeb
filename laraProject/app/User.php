<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable {

    use Notifiable;
    protected $table = 'user';
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function hasRole($role) {
        
        $user_role = collect(DB::select(DB::raw("SELECT * FROM $role WHERE $role.username = '$this->username';")));
        if(sizeof($user_role)!=0)
        {
            return true;
        }
        return false;
    }

}
