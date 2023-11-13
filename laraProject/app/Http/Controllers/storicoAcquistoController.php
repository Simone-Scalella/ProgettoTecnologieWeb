<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\storico_acquisti;
use App\Models\Resources\User2;
use App\Models\Resources\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class storicoAcquistoController extends Controller
{
    protected $_user;
    protected $userRole;
    protected $model_storico;
	public function __construct()
    {    
        $this->middleware(function ($request, $next) { //middleware privileggio
            $this->_user = Auth()->user();
            if ($this->_user) {
                $this->model_storico = new storico_acquisti;
                $this->userRole = $this->_user->hasRole('user2'); 
            }
            else
            {
                $this->userRole = false;
            }       
            return $next($request);
        });    
    }

    public function get_storico()
    {
        if($this->userRole){
            $id_utente = $this->_user->username;
            $storico = $this->model_storico->get_storic($id_utente)->paginate(3); //ritorna una collezione
            //dd($storico);
            return view('vistaStoricoAcquisto')->with('storAq',$storico);
        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }
    }

    public function get_anagrafiche()
    {
    	if($this->userRole){
            $id_utente = $this->_user->username;
    	    $provaStampa = new User2;
            $riga = ($provaStampa::where('username', $id_utente)->get());
            
            if (!empty($riga))
            {
                $riga = ($provaStampa::where('username', $id_utente)->get())[0]->getattributes();
            }
    	    return view('datiUser2View')->with('dati',$riga);
        }
        else
        {
    	   return view('errore')->with('messaggio','errore autenticazione');  	
        }
    }

    public function set_anagrafiche()
    {
        if($this->userRole){
            $id_utente = $this->_user->username;
            $provaStampa2 = new User2;
            $set_riga = ($provaStampa2::where('username', $id_utente)->get())[0]->getattributes();
            
            return view('vistaModificaDati2')->with('dati',$set_riga);
        }
        else{
            return view('errore')->with('messaggio','errore autenticazione');   
        }
    }

    public function set_anagraficheEmPass()
    {
        if($this->userRole){
            $id_utente = $this->_user->username;
            $provaStampa = new User;
            $set_riga2 = ($provaStampa::where('username', $id_utente)->get())[0]->getattributes();
            return view('vistaModificaDati2EmPass')->with('dati',$set_riga2);
        }
        else{
            return view('errore')->with('messaggio','errore autenticazione');        
        }
    }
}