<?php

namespace App\Http\Requests;

use App\Models\Geografia_Italia;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class RegioneRequest extends FormRequest {

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
     *, Rule::in((new Geografia_Italia)->get_all_regione())
     * @return array
     */
    public function rules() {
        return [
            'regione' => ['required', Rule::in((new Geografia_Italia)->get_all_regione())]
        ];
    }

}