<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;


class RegisterUser2Request extends FormRequest {

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
            'username' => ['required', 'string', 'max:50','unique:user'],
            'nome' => ['required', 'string', 'max:50'],
            'cognome' => ['required', 'string', 'max:50'],
            'via_residenza' => ['required', 'string','max:50'],
            'numero_civ' => ['int','min:0','max:4294967295'],
            'citta' => ['required','string','max:50'],
            'data_nascita' => ['required','date'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }

   protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    } 

}