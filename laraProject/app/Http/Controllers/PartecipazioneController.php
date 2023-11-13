<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\partecipazione;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PartecipazioneController extends Controller
{
    protected $partecipazione_model;
    protected $_user;
    protected $userRole;

    public function __construct(){

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

    public function segui($id_event)
    {   
        if ($this->userRole == false) 
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }

        if(is_null(Evento::find($id_event))) // se evento esiste
        {
            return view('errore')->with('messaggio','evento non trovato'); 
        }

        $controllo = partecipazione::where('id_evento',$id_event)->where('user2',$this->_user->username)->count();
        if($controllo >= 1)
        {
          return view('errore')->with('messaggio','stai gia partecipando questo evento');
        }
        $data_evento = (Evento::where('id_evento',$id_event)->get())[0]->data_evento;
        if(Carbon::now() <= $data_evento){
            $partecipazione_model = new partecipazione;
            $request_segui['id_evento'] = $id_event;
            $request_segui['user2'] = auth()->user()->username;
            $partecipazione_model->fill($request_segui)->save();
            
            return redirect()->route('lista_eventi');
        }
        else{
            $risultato = "ATTENZIONE, non puoi partecipare a un evento che è gia' avvenuto.";
            return view('errore')->with('messaggio',$risultato);
        }
       
    }
    
}
