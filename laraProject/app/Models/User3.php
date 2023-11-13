<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User3 extends Model{
    
    protected $table = 'user3';
    protected $primaryKey = 'username';
    protected $keyType= 'string';
    public $incrementing= false;
    public $timestamps = false;
    protected $fillable = ['username','tipo_societa','citta','nome_organizzazione'];
    protected $hidden = [
        'username','citta','nome_organizzazione', 'remember_token',
    ];
  
  
  public function get_user3($id)
    {
    	
        return $this->where('username',$id);
    }
  
  public static function get_all_users()
    {
        return parent::select('nome_organizzazione','username');
    }

  public static function get_filter_organizzatore()
    {   
        $orgs = parent::select('nome_organizzazione')->get()->pluck('nome_organizzazione')->toArray();
        $orgs = array_combine($orgs, $orgs);
        $orgs[NULL] = NULL;
        return $orgs;
    }
}