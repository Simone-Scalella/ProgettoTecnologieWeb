<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ModificaFAQRequest;
use App\Http\Requests\CreateFaqRequest;

class FAQcontroller extends Controller
{
    
    protected $faq;
    protected $_user;
    protected $userRole;
    public function __construct()
    {
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
        $this->faq = new FAQ;
    }
    
    public function GetFAQ(){
        
        $FaqList = FAQ::all();
        return view('FAQsito')->with('FAQList',$FaqList);
    }
        
    public function set_faq(CreateFaqRequest $data)
    {
        //dd($data);
       if($this->userRole){
       
        //$data = $this->validator($array->all())->validate();
     
        
        $id_admin = $this->_user->username;
        
        $nuovafaq = FAQ::create([
           'Domanda' => $data['Domanda'],
           'risposta' => $data['risposta']
          ]);
         }
        else{
            return view('errore')->with('messaggio','errore autenticazione');
        }
        return response()->json(['redirect' => route('FAQsito')]);
    }
    
    public function Modifica_FAQ($numero)
    {
        //check autenticazione
        if($this->userRole)
        {            
            $FAQ = ($this->faq->get_FAQ($numero)->get()->first());
            if (!is_null($FAQ))
            {
                
                return view('VistaModificaFaq')->with('FAQ',$FAQ);  //return view
            }
            else
            {
                return view('errore')->with('messaggio','faq non trovato');
            }
            
        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');//serve solo per rimandare l'utente in una zona non autorizzata, da cambiare con una più idonea
        }        

    }

    public function update_FAQ(ModificaFAQRequest $request)
    {
        if($this->userRole)
        {
            //update            
            $this->faq
                 ->where('numero',$request->numero)
                 ->update(
                   [
                    'Domanda' => $request->Domanda,
                    'risposta' => $request->risposta
                   ]
                 );
                // dd($request);
            return response()->json(['redirect' => route('FAQsito')]);            
        }
        else
        {
             return view('errore')->with('messaggio','errore autenticazione');//serve solo per rimandare l'utente in una zona non autorizzata, da cambiare con una più idonea
        }
    }
}
