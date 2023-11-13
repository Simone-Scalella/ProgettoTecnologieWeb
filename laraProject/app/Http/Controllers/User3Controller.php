<?php

namespace App\Http\Controllers;

use App\Models\Resources\User3;
use App\Models\eventi_personali_User3;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Evento;
use App\Models\Geografia_Italia;
use App\Models\acquisto_biglietto;
use App\Models\partecipazione;
use App\Http\Requests\ModificaEventoRequest;
use Illuminate\Support\Facades\File;

class User3Controller extends Controller {

	protected $_user3;
    protected $_user;
    protected $userRole;
    protected $geografia;
    protected $user3_eventi;
	public function __construct() {
        $this->geografia = new Geografia_Italia;
        $this->_user3 = new User3;
        $this->user3_eventi = new eventi_personali_User3;
        $this->middleware(function ($request, $next) { //middleware privileggio
            $this->_user = Auth()->user();
            if ($this->_user) {
                $this->userRole = $this->_user->hasRole('user3'); 
            }
            else
            {
                $this->userRole = false;
            }       
            return $next($request);
        });
    }

    public function get_CreaEvento(){

        if($this->userRole){

            $regione = $this->geografia->get_all_regione();
            $province = $this->geografia->get_all_province();
            return view('VistaCreaEvento')
                    ->with('regione',$regione)
                    ->with('province',$province);

        }
        else{

            return view('errore')->with('messaggio','errore autenticazione');
        }
    }

    public function Get_anagrafiche() {

        if($this->userRole){

            $id_utente = $this->_user->username;
            $riga = ($this->_user3->where('username', $id_utente)->get())[0]->getattributes();
            return view('datiUser3View')->with('dati',$riga);
        }
        else{

            return view('errore')->with('messaggio','errore autenticazione');
        }
    }

    public function set_eventOrganizzatore(ModificaEventoRequest $Request)
    {
        if($this->userRole){

            if ($Request->hasFile('image')) {
                $image = $Request->file('image');
                $imageName = $image->getClientOriginalName();
            } else {
                $imageName = NULL;
            }

                $id_organizzatore = $this->_user->username;
                $evento_org = new eventi_personali_User3;    
                if(is_null($Request->data_sconto))
                {
                    $Request->data_sconto = $Request->data_evento;
                }
                $evento_org = eventi_personali_User3::create([
                    'nome_evento' => $Request->nome_evento,
                    'data_evento' => $Request->data_evento,
                    'durata' => $Request->durata,
                    'prezzo_unitario' => $Request->prezzo_unitario,
                    'numero_biglietti' => $Request->numero_biglietti,
                    'indirizzo_evento' => $Request->indirizzo_evento,
                    'descrizione' => $Request->descrizione,
                    'organizzatore' => $id_organizzatore,
                    'regione' => $Request->regione,
                    'citta' => $Request->citta,
                    'provincia' => $Request->provincia,
                    'data_sconto' => $Request->data_sconto,
                    'sconto'=> $Request->sconto,
                    'indicazioni' => $Request->indicazioni,
                    'programma'=> $Request->programma
                ]); 
                $sostituto = (string)$evento_org->getattributes()['id_evento'];

                if (!is_null($imageName)) {
                    $imageName = ($sostituto . $imageName);
                    $destinationPath = public_path() . '/images';
                    $image->move($destinationPath, $imageName);
                }else {
                    $imageName = 'default.jpg';
                }

                $evento_org = eventi_personali_User3::where('id_evento', $sostituto)
                ->update(['immagine' => $imageName]);
                
                $percentuale = $Request->sconto;
                $prezzo_unitario = $Request->prezzo_unitario;
               
                $pr_sconto = ($prezzo_unitario*(100-$percentuale))/100;
              
                $aggiornamento =  eventi_personali_User3::where('id_evento', $sostituto)
                ->update(['prezzo_scontato' => $pr_sconto]);

                return response()->json(['redirect' => route('home_content')]);
        }
        else
        {
           return view('errore')->with('messaggio','errore autenticazione');
        } 
    }

    public function cancella_evento($id_event)
    {

        if($this->userRole)
        {
            $evento = $this->user3_eventi->get_evento_singolo($id_event,$this->_user->username)->first();

            if (is_null($evento))
            {
                return view('errore')->with('messaggio','evento non trovato'); 
            }
            
            $percorso = 'images/';
            $query_immagine = $this->user3_eventi->get_evento_singolo($id_event)->get()->first();
            if($query_immagine->immagine != NULL AND $query_immagine->immagine != 'default.jpg')
            {
                $nome_immagine =$query_immagine->getattributes();
                $percorso = $percorso . $nome_immagine['immagine']; 
                File::delete($percorso);
            }
            $this->user3_eventi->cancella_evento($id_event);

            return redirect()->route('eventi3');
            }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }
    }
}