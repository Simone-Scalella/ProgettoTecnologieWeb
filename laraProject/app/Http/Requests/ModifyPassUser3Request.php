<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;


class ModifyPassUser3Request extends FormRequest {

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
        return [  
            'username' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed','max:30']
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