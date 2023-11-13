<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User2;
use App\Models\Resources\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;

class listUser2Controller extends Controller
{
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

    }

    public function showlist_users($num_per_page = 4)
    {   
        if($this->userRole){
            $users_list = User2::get_all_users()
                ->paginate($num_per_page);
            return view('listUsers2')->with('UserList',$users_list);
        }
        else
        {
            return view('errore')->with('messaggio','errore autenticazione');
        }
    }
        
        
        
}


