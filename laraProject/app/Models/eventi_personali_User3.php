<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class eventi_personali_User3 extends Model{

	protected $table = 'evento';
	protected $primaryKey = 'id_evento';    
    protected $fillable = ['id_evento','nome_evento','data_evento','data_sconto','sconto','prezzo_scontato','durata','immagine','incasso_evento','prezzo_unitario','indicazioni','numero_biglietti','indirizzo_evento','descrizione','organizzatore','regione','citta','provincia','programma'];
    public $timestamps = false;

	public function get_elenco3($utente)
    {
        return Evento::get_all_event()
        ->withCount(['biglietti as biglietti_venduti'=> function($query){$query->select(DB::raw('IFNULL(sum(quantita),0)'));}])
        ->withCount(['biglietti as percentuale'=> function($query){$query->select(DB::raw('IFNULL(round((sum(quantita)/evento.numero_biglietti*100),2),0)'));}])
        ->addselect(DB::raw('round(evento.incasso_evento,2) as incasso_evento'))
        ->where('organizzatore','=',$utente);

    }

    public function get_evento_singolo($id_evento,$organizzatore=null)
    {
        if(isset($organizzatore))
        {
            return $this->get_elenco3($organizzatore)->where('id_evento',$id_evento);
        }
        else
        {
            return $this->where('id_evento',$id_evento);
        }
        
    }

    public function set_evento()
    {

    }

    public function cancella_evento($id)
    {   
        partecipazione::where('id_evento', $id)->delete();
        acquisto_biglietto::where('id_evento', $id)->delete();
        return $this->where('id_evento', $id)->delete();
    }

    public function biglietti()
    {
        return $this->hasMany(acquisto_biglietto::class,'id_evento');
    }

    public function partecipazione()
    {
        return $this->hasMany(partecipazione::class,'id_evento');
    }
}