<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\CatalogoEvento;
use Illuminate\Http\Request;
use App\Http\Requests\FilterRequest;


class filterController extends Controller
{
    protected $_eventModel;
    
    public function __construct()
    {        
        
    }
    
    
    public function show_filter()
    {
        return view('filter')->with('regione',Evento::get_regioni());
    }



    public function showlistevento1()
    {   $cat_event = new CatalogoEvento();
        $Event_list = $cat_event->getalleventi();
        return view('listEvent')->with('EventList',$Event_list);
    }
    //
}
