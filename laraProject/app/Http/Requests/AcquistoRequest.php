<?php

namespace App\Http\Requests;

use App\Models\acquisto_biglietto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class AcquistoRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        if(!$this->ismethod('POST'))
        {
            throw new HttpResponseException(response()->view('errore',['messaggio' => 'Errore di metodo: Puoi usare solo il metodo POST']));
        }

        return [
            //'username' => 'required', //case sensitive
            'quantita' => 'int|required|min:1', // acquisti almeno 1 biglietto
            'tipo_pagamento' => ['required', Rule::in( (new acquisto_biglietto)->get_metodo())]
        ];
    }

}