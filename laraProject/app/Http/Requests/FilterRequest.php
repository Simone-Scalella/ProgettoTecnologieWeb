<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Granted for all user
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [ 
           'descrizione' => ['nullable','string','max:100'],
           'regione' => ['nullable','string','max:50'],
           'provincia' => ['nullable','string','max:2'],
           'organizzatore' => ['nullable','string','max:50'],
           'data_inizio' => ['nullable','date'],
           'data_fine' => ['nullable','date']
           ];//TODO : make rule
    }

}