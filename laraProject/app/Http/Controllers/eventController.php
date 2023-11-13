<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Evento;
use App\Models\User3;
use App\Models\CatalogoEvento;
use App\Http\Requests\FilterRequest;
use App\Http\Controllers\Controller;
use App\Models\acquisto_biglietto;
use App\Models\partecipazione;
use Illuminate\Support\Facades\DB;



class eventController extends Controller
{
    protected $_eventModel;
    protected $user;
    protected $num_per_page = 4;

    public function __construct()
    {
        
    }
    
    //patch per simple conversion
    public function convert(&$eventi)
    {
        $eventi->each(function($item,$key)
        {
                $item->nome_organizzazione = $item->user3->nome_organizzazione;
        });
    }

    public function get_evento($id_evento)
    {

        $evento_singolo = (new Evento)->get_specific_evento($id_evento)->get();//
        $this->convert($evento_singolo);
        if(count($evento_singolo))
        {   
            if(auth()->user())
            {
                $evento_singolo[0]->verifica = $evento_singolo[0]->partecipazione->where('user2',auth()->user()->username)->count(); //0 o massimo uno
            }
            return view('eventospecifico')->with('evento',$evento_singolo[0]);
        }
        else
        {
            return view('errore')->with('messaggio','evento non trovato');
        }

        
    }
    
    public function showlistevento()
    {   
        $Event_list = Evento::get_all_event()->paginate($this->num_per_page);
        //genera la lista dei organizzatore
        $Org_list = User3::get_filter_organizzatore();
        $this->convert($Event_list);
        return view('listEvent')->with('EventList',$Event_list)
            ->with('regione',Evento::get_regioni())
            ->with('nome_organizzatore',$Org_list);
    }

    public function filter_eventi(FilterRequest $request)
    {   
        $filter = $request->input();
        $Event_list = Evento::get_all_event()->get();
        $this->convert($Event_list);
        //dd($filter);
        if(isset($filter['descrizione'])) 
        {
            $Event_list = $Event_list->filter(function($value,$key) use ($filter) {
                if(strpos($value->descrizione,$filter['descrizione']) !== false)
                {
                    return true;
                }
                else{return false;}
                }
            );
        }

      
        if(isset($filter['regione']) and $filter['regione']!=0) 
        {
        	$reg = Evento::get_regioni();
        	$Event_list = $Event_list->where('regione','=',$reg[$filter['regione']]);
        }

        if(isset($filter['organizzatore'])) 
        {   
            
            $Event_list = $Event_list->where('nome_organizzazione','=',$filter['organizzatore']);
        }

        if(isset($filter['data_inizio'])) 
        {
            $Event_list = $Event_list->where('data_evento','>=',$filter['data_inizio']);
        }

        if(isset($filter['data_fine']))
        {
            $Event_list = $Event_list->where('data_evento','<=',$filter['data_fine']);
        }

        $Event_list = $Event_list->paginate($this->num_per_page)->appends($filter);
        $Org_list = User3::get_filter_organizzatore();
        
        return view('listEvent')->with('EventList',$Event_list)
            ->with('regione',Evento::get_regioni())
            ->with('nome_organizzatore',$Org_list)
            ->with('filter',$filter);

    }

}
