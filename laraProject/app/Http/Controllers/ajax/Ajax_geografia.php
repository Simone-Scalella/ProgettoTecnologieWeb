<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use App\Models\Geografia_Italia;
use App\Http\Requests\ProvinceRequest;
use App\Http\Requests\RegioneRequest;

class Ajax_geografia extends Controller
{
    protected $geografia;
    
    public function __construct(){

        $this->geografia = new Geografia_Italia;
    }
    
    public function get_regione(ProvinceRequest $provincia){
        
        $regione = $this->geografia->get_regione($provincia->provincia);
        return response($regione,200);

    }

    public function get_all_regione(){
        
        $regione = $this->geografia->get_all_regione();
        return response($regione,200);

    }

    public function get_province(RegioneRequest $regione){

        $province = $this->geografia->get_province($regione->regione);
        return response($province,200);
    }

    public function get_all_province(){

    $province = $this->geografia->get_all_province();
    return response($province,200);
    }

}   

