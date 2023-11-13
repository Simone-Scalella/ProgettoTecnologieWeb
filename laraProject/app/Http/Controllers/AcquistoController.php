<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\acquisto_biglietto;
use App\Http\Requests\AcquistoRequest;
use Carbon\Carbon;


class AcquistoController extends Controller
{
    protected $acquisto; 
    protected $_user;
    protected $userRole;

    public function __construct()
    {
        $this->acquisto = new acquisto_biglietto;
        $this->middleware(function ($request, $next) { //middleware privileggio
            $this->_user = Auth()->user();
            if ($this->_user) {
                $this->userRole = $this->_user->hasRole('user2'); 
            }
            else
            {
                $this->userRole = false;
            }       
            return $next($request);
        });
    }

    public function form_acquista($id_evento)
    {
        $evento_spec = Evento::get_specific_evento($id_evento)->first();
        if(!is_null($evento_spec))
        {   
            if($evento_spec->bigl_disp>0)
            {
                return view('acquisto_biglietto')->with('evento',$evento_spec)
                ->with('tipo_pagamento',((new acquisto_biglietto)->get_metodo())); //controllo privileggio nella vista
            }
            else
            {
                return view('errore')->with('messaggio','Biglietto esaurito');
            }
            

        }
        else
        {
            return view('errore')->with('messaggio','evento non trovato/non esiste');
        } 
        
    }

    public function acquista(AcquistoRequest $request)
    {   
        $evento_spec = Evento::get_specific_evento($request['id_evento'])->first();
        if (is_null($evento_spec)) {
           return view('errore')->with('messaggio','Evento non esiste');
        }
        if(Carbon::now() <= $evento_spec->data_evento){
            if($evento_spec->bigl_disp>0){
                
                $request_data = $request->only(['id_evento','quantita','tipo_pagamento','costo']);
                $request_data['user2'] = $this->_user->username;
                $request_data['costo'] = $request_data['costo']*$request_data['quantita'];
                $this->acquisto->fill($request_data)->save();
                Evento::update_acquisto($request_data);
                return redirect()->route('riepilogo_biglietto',[$this->acquisto->id_acquisto]);
            }
            else
            {
                return view('errore')->with('messaggio','Biglietto esaurito');
            }
            
        }
        else
        {
           $risultato = "ATTENZIONE, non puoi acquistare biglietti di un evento che è gia' avvenuto.";
           return view('errore')->with('messaggio',$risultato);
        }
    }
    
    public function get_riepilogo($id_acquisto)
    {   
        if($this->userRole){
            $riepilogo = $this->acquisto->get_riepilogo($id_acquisto,$this->_user->username);
            if (!is_null($riepilogo)) {
                $Evento = Evento::get_specific_evento($riepilogo->id_evento)->get()->first();
                $Evento->nome_organizzazione = $Evento->user3->nome_organizzazione;
                return view('view_riepilogo_biglietto')->with('riepilogo',$riepilogo)
                                        ->with('evento',$Evento);            }
            else
            {
                return view('errore')->with('messaggio','riepilogo non trovato/non esiste');
            }

        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }


    }
}
