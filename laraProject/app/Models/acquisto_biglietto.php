<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\DB;

class acquisto_biglietto extends Model{
    
    protected $table = 'acquisto_biglietto';
    protected $primaryKey = 'id_acquisto';
    protected $metodo_acquisto = ['visa'=>'visa',
                                        'paypal'=>'paypal',
                                        'maestro'=>'maestro'];
    protected $fillable = ['id_evento','user2','tipo_pagamento','quantita','costo'];
    public $timestamps = false;
    public function getkey(){
        return $this->primaryKey;
    }
    
    public function get_metodo()
    {
        return $this->metodo_acquisto;
    }

    public function qurey(){
        return $this->where('id_evento', 2)->get();
    }

    public function get_riepilogo($id_acquisto,$user)
    {
        return $this->where('id_acquisto',$id_acquisto)
                    ->where('user2',$user)->get()->first();
    }

    public static function aggiunge_acquisto($info_acquisto)
    {
        $this->save();


        return 0;
    }
}