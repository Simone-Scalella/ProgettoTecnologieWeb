<?php

namespace App\Http\Controllers;

use App\Models\Resources\User4;
//use app\Models\eventi_personali_User3;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User3;
use App\Models\User;
use App\Models\User2;
use App\Models\FAQ;
use App\Http\Requests\ModificaFAQRequest;
use App\Http\Requests\CreateUser3Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FilterRequest;
use App\Http\Controllers\Controller;
use App\Models\acquisto_biglietto;
use App\Models\Evento;
use App\Models\partecipazione;


class User4Controller extends Controller 
{

	protected $_user4;
    protected $_user3;
    protected $_user;
    protected $userRole;

	public function __construct()
    {
        //$this->middleware('can:isUser4'); //Produce un 403
        $this->_user4 = new User4;
        $this->_user3 = new User3;
        $this->middleware(function ($request, $next) { //Middleware entra dopo il costruttore quindi dobbiamo definire in modo esplicito
            $this->_user = Auth()->user();
            if ($this->_user) {
                $this->userRole = $this->_user->hasRole('user4'); 
            }
            else
            {
                $this->userRole = false;
            }       
            return $next($request);
        });
    }



    public function Get_anagrafiche() {

        if ($this->userRole)
        {
            $id_utente = $this->_user->username;
            $_user4 = new User4;
            $riga = ($_user4->where('username', $id_utente)->get())[0]->getattributes();
            return view('datiUser4View')
            ->with('dati',$riga);
        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }

    }
    
    public function set_createUser3(CreateUser3Request $Request)
    {
       if($this->userRole)
       {
       
        $data = $Request->all();        
        $id_admin = $this->_user->username;

        $organizzatoreCredenziali = User::create([
            'username' => $data['username'],
            'password' =>Hash::make($data['password']),
          ]);
        
        $organizzatore = User3::create([
            'username' => $data['username'],
            'citta' => $data['citta'],
            'tipo_societa' => $data['tipo_societa'],
            'nome_organizzazione' => $data['organizzazione'],
            
        ]);

        }
        else{
            return view('errore')->with('messaggio','errore autenticazione');
        }
        return response()->json(['redirect' => route('ListUser3')]);;
    }    
    
    public function cancella_user2($username)
    {
        if($this->userRole)
        {
            $user2 = User2::where('username', $username)->get();
            if (count($user2))
            {
                $this->delete_user2($username);
                $this->delete_user_general($username);
                return redirect()->route('ListUser2');
            }
            else
            {
                return view('errore')->with('messaggio','utente2 non trovato');
            }

        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }
    }

    public function delete_user2($username)
    {
        $this->delete_biglietti_user($username);
        $this->delete_partecipazione_user($username);
        return User2::where('username', $username)
                    ->delete();
    }
    
    public function delete_biglietti_user($username)
    {
        return acquisto_biglietto::where('user2', $username)
            ->delete();        
    }

    public function delete_partecipazione_user($username)
    {
        return partecipazione::where('user2', $username)
            ->delete();        
    }
    
    
    public function cancella_user3($username)
    {
        if($this->userRole)
        {
            $user3 = User3::where('username', $username)->get();
            if (count($user3))
            {
                $this->delete_user3($username);
                $this->delete_user_general($username);
                return redirect()->route('ListUser3');
            }
            else
            {
                return view('errore')->with('messaggio','utente3 non trovato');
            }

        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }
    }

    public function delete_user3($username)
    {
        $this->delete_evento_user3($username);
        return User3::where('username', $username)
                    ->delete();        
    }
    
    public function delete_evento_user3($username)
    {
        $id_evento = Evento::select('id_evento')->where('organizzatore',$username)->get()->pluck('id_evento')->toArray();
        acquisto_biglietto::whereIn('id_evento', $id_evento)->delete();
        partecipazione::whereIn('id_evento', $id_evento)->delete();
        return evento::where('organizzatore', $username)->delete();        
    }

    public function delete_user_general($username)
    {
        return User::where('username', $username)
                    ->delete(); 
    }
    
    public function cancella_FAQ($Numero)
    {
        if($this->userRole)
        {
            if(count(FAQ::where('numero', $Numero)->get()))
            {
                $this->delete_Faq($Numero);
                return redirect()->route('FAQsito');
            }
            else
            {
                return view('errore')->with('messaggio','faq non trovato');
            }
            
        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }
    }
    
    public function delete_Faq($Numero)
    {
        return FAQ::where('numero', $Numero)
                    ->delete(); 
    }
    
    public function set_anagrafica3($username)
    {
        //check autenticazione
        if($this->userRole)
        {
            $user3 = ($this->_user3->get_user3($username)->get()->first());
            if(!is_null($user3))
            {
                return view('VistaModificaUtente3')->with('user3',$user3);  //return view
            }
            else
            {
                 return view('errore')->with('messaggio','utente3 non trovato');
            }
            
        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }

    }
    
    public function set_pass3($username)
    {
        if($this->userRole)
        {   
            $user = User::where('username', $username)->first();            
            if (!is_null($user)) {
                $set_riga2 = $user->getattributes();
                return view('vistaModificaPass3')->with('dati',$set_riga2);
            }
            else
            {
                return view('errore')->with('messaggio','utente3 non trovato');
            }
            
        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');        
        }
    }
}