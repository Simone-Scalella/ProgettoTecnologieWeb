<?php

namespace App\Http\Requests;

use App\Models\Geografia_Italia;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ProvinceRequest extends FormRequest {

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
            'provincia' => ['required', Rule::in( (new Geografia_Italia)->get_all_province())]
        ];
    }

}