<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Geografia_Italia extends Model{
    
    protected $table = 'province';
    protected $_primary = ['id_provincia'];
    public $timestamps = false;

    public function get_all_regione(){
        $regione = $this->select('regione_province')->get()->pluck('regione_province')->toArray();
        $regione = array_combine($regione,$regione);
        $regione[''] = '';//valore placeholder (non influisce al validator)
        return $regione;
    }

    public function get_all_province(){
        $province = $this->select('sigla_province')->get()->pluck('sigla_province')->toArray();
        $province = array_combine($province,$province);
        $province[''] = '';//valore placeholder (non influisce al validator)
        return $province;
    }

    public function get_regione($provincia){

        return $this->select('regione_province')->where('sigla_province',$provincia)->get()->pluck('regione_province')->toArray();
    }

    public function get_province($regione){

        return $this->select('sigla_province')->where('regione_province',$regione)->get()->pluck('sigla_province')->toArray();
    }

}