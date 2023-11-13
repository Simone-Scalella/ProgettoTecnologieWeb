<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class storico_acquisti extends Model{
    protected $table = 'acquisto_biglietto';
    protected $primaryKey = 'id_acquisto';

public function get_storic($utente)
    {
        return $this->where('user2',$utente);
    }

}