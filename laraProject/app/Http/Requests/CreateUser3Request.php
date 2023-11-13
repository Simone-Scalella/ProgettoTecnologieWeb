<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;


class CreateUser3Request extends FormRequest {

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

    public function rules() {
        return [  
            'username' => ['required','string', 'max:50','unique:user'],
            'password' => ['required', 'string','min:8', 'max:30','confirmed'],
            'citta' => ['required','string', 'max:50'],
            'tipo_societa' => ['required', 'string', 'max:20'],
            'organizzazione' => ['required', 'string', 'max:50'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if(!$this->ismethod('POST'))
        {
            throw new HttpResponseException(response()->view('errore',['messaggio' => 'Errore di metodo: Puoi usare solo il metodo POST']));
        }
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    } 

}