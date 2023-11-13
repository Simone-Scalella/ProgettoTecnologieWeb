<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\acquisto_biglietto;
use Illuminate\Support\Facades\DB;

class Evento extends Model{
    
    protected $table = 'evento';
    protected $primaryKey ='id_evento';

    protected $fillable = ['id_evento','nome_evento','data_evento','data_sconto','durata','immagine','incasso_evento','prezzo_unitario','indicazioni','prezzo_scontato','sconto','numero_biglietti','indirizzo_evento','descrizione','organizzatore','regione','citta','provincia','programma'];
    public $timestamps = false;
    protected static $regione = [NULL => NULL,'Valle d’Aosta','Piemonte','Liguria','Lombardia','Trentino-Alto Adige','Veneto','Friuli-Venezia Giulia','Emilia Romagna','Toscana','Umbria','Marche','Lazio','Abruzzo','Molise','Campania','Puglia','Basilicata','Calabria','Sicilia','Sardegna'];
    protected $appends = ['biglietti_venduti'];


    public static function get_all_event()
    {

        return self::select('*')
        ->addselect(DB::raw('CONVERT(data_evento,DATE) as data_evento'),DB::raw('CONVERT(data_sconto,DATE) as data_sconto'),DB::raw('round(prezzo_unitario,2) as prezzo_unitario'),DB::raw('round(prezzo_scontato,2) as prezzo_scontato'))
        ->withCount(['biglietti as bigl_disp'=> function($query){$query->select(DB::raw('numero_biglietti - IFNULL(sum(quantita),0)'));}])
        ->withCount('partecipazione as segui')
        ->with(['user3' => function($query){$query->select('username','nome_organizzazione');},'partecipazione']);
    }

    public static function get_specific_evento($id)
    {        

        return self::get_all_event()->where('id_evento',$id);
    }

    public static function update_acquisto($dati_acquisto)
    {
        $evento = Evento::get_specific_evento($dati_acquisto['id_evento'])->get();
        DB::table('evento')        
        ->where('id_evento',$dati_acquisto['id_evento'])
        ->update(['incasso_evento'=>($evento[0]->incasso_evento+$dati_acquisto['costo'])]);
    }

    public function get_topn_biglietti($n)
    {
        return $this->withCount(['biglietti as venduti'=> function($query){
            $query->select(DB::raw('IFNULL(sum(quantita),0)'));
        }])
        ->OrderBy('venduti','desc')
        ->take($n)
        ->get();
    }

    public function get_topn_partecipazioni($n)
    {
        return $this->withCount('partecipazione as num_partecipanti')
        ->OrderBy('num_partecipanti','desc')
        ->take($n)
        ->get();
    }


    public static function get_regioni()
    {   
        return self::$regione;
    }

    public function biglietti()
    {
        return $this->hasMany(acquisto_biglietto::class,'id_evento');
    }

    public function partecipazione()
    {
        return $this->hasMany(partecipazione::class,'id_evento');
    }

    public function user3()
    {
        return $this->belongsTo(User3::class,'organizzatore','username');
    }
}