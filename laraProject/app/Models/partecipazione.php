<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\DB;

class partecipazione extends Model{
    
    protected $table = 'partecipazione';
    protected $primaryKey = ['id_evento','user2'];
    public $incrementing = false;
    protected $fillable = ['id_evento','user2','data_acquisto'];
    public $timestamps = false;
}