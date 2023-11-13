<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Resources\User;
use App\Models\Resources\User2;
use App\Http\Requests\RegisterUser2Request;

class RegisterController2 extends Controller
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

    use RegistersUsers;

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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   /* protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            //'username' => ['required', 'string', 'username', 'max:255', 'unique:users'],
            //'username' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    } */ //eliminare appena possibile 

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(RegisterUser2Request $data)
    {
       // dd($data);
        $prova = [User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]),User2::create([
            'username' => $data['username'],
            'nome' => $data['nome'],
            'cognome' => $data['cognome'],
            'via_residenza' => $data['via_residenza'],
            'numero_civ' => $data['numero_civ'],
            'citta' => $data['citta'],
            'data_nascita' => $data['data_nascita'],
        ])];
        return $prova[1];
    }
}
