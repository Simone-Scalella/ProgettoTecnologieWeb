<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Resources\User2;
use App\Models\Resources\User;
use App\Http\Requests\ModifyUser2Request;
use App\Http\Requests\ModifyPassUser2Request;

class ModifyController2 extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    
    //protected $redirectTo = '/home';
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function modificare(ModifyUser2Request $data)
    {
        $id_utente = auth()->user()->username;
        $prova =User2::where('username', $id_utente)
                    ->update(['nome' => $data['nome'],
                        'cognome' => $data['cognome'],
                        'via_residenza' => $data['via_residenza'],
                        'numero_civ' => $data['numero_civ'],
                        'citta' => $data['citta'],
                        'data_nascita' => $data['data_nascita']]);

       return response()->json(['redirect' => route('home_content')]);
    }

    protected function modificarePassEmm(ModifyPassUser2Request $data)
    {
       
        //$data = $this->validatorPassEm($array->all())->validate();
        $id_utente = auth()->user()->username;

        $prova4 =User::where('username', $id_utente)
                    ->update(['password' => Hash::make($data['password'])]);
       auth()->logout();
       return response()->json(['redirect' => route('home_content')]);
    }
}