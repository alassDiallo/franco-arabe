<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEnregistrerEleve extends FormRequest
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


        $annee = date('d-m-Y',strtotime(date('Y-m-d')."-5 years"));

        return [
            'nom'=>'required| min : 2 | string | alpha',
            'prenom'=>'required |string | min : 2 | alpha',
            'adresse'=>'required |string | min : 3 ',
            'telephone'=>'required | digits_between:9,9 | max:9 | unique:eleves',
            //'nomUtilisateur'=>'required | alpha_dash | min : 2 | unique:eleves',
            'anneeScolaire'=>'required | string',
            'dateDeNaissance'=> 'required | date |  before_or_equal: '.$annee,
            'lieudenaissance'=>'required | alpha | string | min : 3',
            'sexe'=>'required',
            'sommeVerse'=>'required | integer | min:1 | max:'.$classe->montantInscription,
            'reliquat'=>'required | min : 0 | different : sommeverse',
            'classe'=>'required',
        ];
    }

    public function message(){

        return [
            'before_or_equal'=>'la date de naissance que vous avez entré n\'est pas valable il doit etre aumoins de 5ans',
        ];
    }
}
