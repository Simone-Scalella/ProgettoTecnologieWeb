<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\eventi_personali_User3;

class ModificaEventoRequest extends FormRequest {

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
            'nome_evento' => ['required', 'string', 'max:30'],
            'data_evento' => ['required', 'date'],
            'durata' => [ 'int','min:0','max:65535'],
            'image' => ['image','max:2048'],
            'prezzo_unitario' => ['required','numeric','min:0','max:999999.999'],
            'numero_biglietti' => ['required', 'int','min:1','max:4294967295'],
            'indirizzo_evento' => ['required', 'string','max:60'],
            'descrizione' => [ 'string','max:3000'],
            'regione' => [ 'required','string',  'max:50'],
            'citta' => ['required','string','max:50'],
            'provincia' => [ 'required','string', 'max:2'],
            'data_sconto' => ['nullable','date'],
            'sconto' => ['numeric','max:100','min:0'],
            'indicazioni'=>['required', 'string','max:3000'],
            'programma'=>['required', 'string','max:3000']
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