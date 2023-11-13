<?php

namespace App\Http\Controllers;

use App\Models\Resources\User2;
use App\Http\Requests\NewUserRequest;
use Illuminate\Foundation\Http\FormRequest;
class User2Controller extends Controller {

	protected $_user2Prova;

	public function __construct() {
        $this->_user2Prova = new User2;
    }

	public function addUser2Prova() {
		$_user2Prova = new User2;
        $_user2Prova->username = 'emailProva2';
        $_user2Prova->nome = 'persona di prova2';
        $_user2Prova->cognome = 10;
        $_user2Prova->via_residenza = 'via delle prove';
        $_user2Prova->numero_civ = 10;
        $_user2Prova->citta = 'modena';
        $_user2Prova->data_nascita = '1999-12-13';
        $_user2Prova->save();
        return view('ProvaView');
                        
    }


    public function storeUser (NewUserRequest $request) 
    {
        $user2Prova = new User2;
        if($request->has('username'))
        {
        	
        	$user2Prova->fill($request->validate($request->rules()));
            	
        	
        }
        else
        {
        	//dd('has no username');
            //questo era commentato, a questo punto togliere anche else?
        }

        $user2Prova->save();

        
        return redirect()->route('ProvaView');
        
    }

}