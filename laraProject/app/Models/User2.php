<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User2 extends Model{
    
    protected $table = 'user2';
    protected $primaryKey = 'username';
    public $timestamps = false;
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['username','nome','cognome','via_residenza','numero_civ','citta','data_nascita'];
    protected $hidden = [
        'username','nome','cognome','via_residenza','numero_civ','citta','data_nascita'
    ];
    
    
    public static function get_all_users()
    {
        
        return DB::table('user2')
            ->select('user2.username','user2.nome','user2.cognome');
    }
}