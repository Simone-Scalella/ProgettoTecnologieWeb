<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DB;

class HomeController extends Controller
{
    protected $_eventModel;
    protected $user;


    public function __construct()
    {
        $this->_eventModel = new Evento;        
        
    }

    public function home(){
        $n = 3;
        $eventi_top_biglietti = $this->_eventModel->get_topn_biglietti($n);
        $eventi_top_partecipazini = $this->_eventModel->get_topn_partecipazioni($n);

        return view('home_content')
                ->with('ListVenduti',$eventi_top_biglietti)
                ->with('ListPartecipati',$eventi_top_partecipazini);
    }
    
}
