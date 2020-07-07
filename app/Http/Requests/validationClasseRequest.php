<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validationClasseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nomClasse'=> 'required | string | min:2 | unique:classes',
            'montantInscription'=>'required | numeric | min:1 ',
            'mensualite'=>'required | numeric |min : 1 | different :montantInscription',
        ];
    }
}
