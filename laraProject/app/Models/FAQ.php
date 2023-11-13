<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FAQ extends Model
{
    protected $table = 'faq'; 
    protected $_primary = 'numero';
    public $timestamps = false;
    protected $fillable = ['numero','Domanda','risposta'];
     

     
     
    public function get_FAQ($numero)
    {
        return $this->where('numero',$numero);
    }
}
