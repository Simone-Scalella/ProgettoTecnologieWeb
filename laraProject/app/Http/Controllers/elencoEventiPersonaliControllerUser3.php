<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\eventi_personali_User3;
use App\Http\Requests\ModificaEventoRequest;
use App\Models\Geografia_Italia;
use Carbon\Carbon;

class elencoEventiPersonaliControllerUser3 extends Controller
{
    protected $evento_user3;
    protected $_user;
    protected $userRole;
    protected $geografia;
	public function __construct()
    {
        $this->evento_user3 = new eventi_personali_User3;
        $this->middleware(function ($request, $next) { //middleware privileggio
            $this->_user = Auth()->user();
            if ($this->_user) {
                $this->geografia = new Geografia_Italia;
                $this->userRole = $this->_user->hasRole('user3'); 
            }
            else
            {
                $this->userRole = false;
            }       
            return $next($request);
        });
    }

    public function get_eventi($num_pagine = 2)
    {
        if($this->userRole)
        {
            $username_utente = $this->_user->username;
            $eventi = $this->evento_user3->get_elenco3($username_utente)->paginate($num_pagine);
            return view('eventi_user3')->with('EventList',$eventi);
        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }
    }
   

    public function get_Evento_singolo($id_evento)
    {
        
        //check autenticazione
        if($this->userRole)
        {
            $regione = $this->geografia->get_all_regione();
            $province = $this->geografia->get_all_province();

            //controlla se l'evento attuale appartiene effettivamente al user che ha fatto la richiesta;
            $organizzatore = $this->_user->username;
            $evento = ($this->evento_user3->get_evento_singolo($id_evento,$organizzatore)->get()->first());
            if (is_null($evento)) 
            {
                //l'evento non appartiene all'organizzatore che ha fatto la richiesta e/o non esiste
                return view('errore')->with('messaggio','Evento non trovato');
            }
            
            $regione = $this->geografia->get_all_regione();
            $province = $this->geografia->get_all_province();

            $evento->time_evento = Carbon::parse($evento->data_evento)->totimestring();
            $evento->data_evento = Carbon::parse($evento->data_evento)->toDatestring();
            $evento->data_evento = $evento->data_evento.'T'.$evento->time_evento;
            
            $evento->time_sconto = Carbon::parse($evento->data_sconto)->totimestring();
            $evento->data_sconto = Carbon::parse($evento->data_sconto)->toDatestring();
            $evento->data_sconto = $evento->data_sconto.'T'.$evento->time_sconto;
            
            return view('VistaModificaEvento')
                    ->with('evento',$evento)
                    ->with('regione',$regione)
                    ->with('province',$province);
         
        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }        

    }

    public function modifica_Evento_singolo(ModificaEventoRequest $request)
    {
        if($this->userRole)
        {
            //controlla se l'evento attuale appartiene effettivamente al user che ha fatto la richiesta;
            $organizzatore = $this->_user->username;
            $evento_org = $this->evento_user3->get_evento_singolo($request->id_evento,$organizzatore)->get()->first();
            if (is_null($evento_org)) 
            {
                return view('errore')->with('messaggio','Evento non trovato');
            }

            $pr_sconto = ($request->prezzo_unitario*(100-$request->sconto))/100;

            $this->evento_user3->where('id_evento',$request->id_evento)
            ->update(
                [
                    'nome_evento' => $request->nome_evento,
                    'data_evento' => $request->data_evento,
                    'durata' => $request->durata,
                    'prezzo_unitario' => $request->prezzo_unitario,
                    'numero_biglietti' => $request->numero_biglietti,
                    'indirizzo_evento' => $request->indirizzo_evento,
                    'descrizione' => $request->descrizione,
                    'regione' => $request->regione,
                    'citta' => $request->citta,
                    'provincia' => $request->provincia,
                    'prezzo_scontato'=> $pr_sconto,
                    'sconto'=> $request->sconto,
                    'indicazioni'=> $request->indicazioni,
                    'programma'=> $request->programma
                ]
            );

            //sezione dell'immagine
            if ($request->hasFile('image')) 
            {
                $img_old = ($this->evento_user3->get_evento_singolo($request->id_evento,$organizzatore)->get()->first())->immagine;

                //cancella l'immagine vecchia se esiste
                if (isset($img_old) AND $img_old != 'default.jpg')
                {
                    File::delete("images/$img_old");
                }

                //estrazione dell'immagine dal request
                $image = $request->file('image');
                $imageName = ((string)$request->id_evento . $image->getClientOriginalName());
                $destinationPath = public_path() . '/images';
                $image->move($destinationPath, $imageName);

                $this->evento_user3->where('id_evento',$request->id_evento)
                ->where('organizzatore',$organizzatore)
                    ->update(
                        [
                            'immagine'=>$imageName
                        ]
                    );
            }
            
            return response()->json(['redirect' => route('home_content')]);            
        }
        else
        {
             return view('errore')->with('messaggio','errore autenticazione');
        }
    }
}

