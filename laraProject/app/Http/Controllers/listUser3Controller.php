<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User3;
use App\Models\Resources\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Models\Evento;

class listUser3Controller extends Controller
{
	public function __construct()
    {

    }

    public function showlist_users($num_per_page = 2)
    {   
        $users_list = User3::get_all_users()
            ->paginate($num_per_page);
        return view('ListUser3')->with('UserList',$users_list);
    }
     
    public function dati_singolo_utente3($num_per_page = 2)
    {
    	$users_list = User3::get_all_users()->paginate($num_per_page);
    	$Event_list = Evento::get_all_event()->get();
        $dim = $users_list->count();
        $dim2 = $Event_list->count();
        for($i = 0; $i < $dim;$i++){
        	$somma_biglietti = 0;
        	$somma_incasso = 0;
        	for($j = 0; $j < $dim2;$j++){
        		$array_nome[$i] = $users_list[$i]->username;
         if($users_list[$i]->username == $Event_list[$j]->organizzatore){
         	$disponibili = $Event_list[$j]->bigl_disp;
         	$totali = $Event_list[$j]->numero_biglietti;
         	$somma_biglietti += ($totali - $disponibili);
         	$somma_incasso += $Event_list[$j]->incasso_evento;
         	
         }
     }
     $users_list[$i]->biglietti = $somma_biglietti;
     $users_list[$i]->incasso = $somma_incasso;
 }
     return view('ListUser3')->with('UserList',$users_list);
 }   
        
        
}


