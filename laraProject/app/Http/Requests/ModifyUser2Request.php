<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;


class ModifyUser2Request extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    public function __construct()
    {

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {



        return [
            'nome' => ['required', 'string', 'max:50'],
            'cognome' => ['required', 'string', 'max:50'],
            'via_residenza' => ['required', 'string','max:50'],
            'numero_civ' => ['required', 'int','max:4294967295'],
            'citta' => [ 'required','string',  'max:50'],
            'data_nascita' => ['required','date'],
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