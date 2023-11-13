<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Resources\User3;
use App\Models\Resources\User;
use App\Http\Requests\ModifyPassUser3Request;
use App\Http\Requests\ModifyUser3Request;

class ModifyController3 extends Controller
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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validatorPassEm(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function modificare(ModifyUser3Request $data)
    {

        $prova = User3::where('username', $data['username'])
                    ->update(['citta' => $data['citta'],
                        'tipo_societa' => $data['tipo_societa'],
                        'nome_organizzazione' => $data['organizzazione']
                            ]);

            return response()->json(['redirect' => route('ListUser3')]);

    }

    protected function modificarePass(ModifyPassUser3Request $data)
    {

    $prova4 = User::where('username', $data['username'])
                    ->update(['password' => Hash::make($data['password'])]);
        //dd($array); 
      // auth()->logout();
     return response()->json(['redirect' => route('ListUser3')]);
    }
}