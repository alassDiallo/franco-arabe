<?php

namespace App\Http\Controllers;

use App\Models\Tuteur;
use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Flashy;
use Illuminate\Validation\Rule;
use MercurySeries\Flashy\Flashy as FlashyFlashy;

class ControllerTuteur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuteurs = Tuteur::with('eleves')->paginate(10);
        return view('parent.listeParents',compact('tuteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'nomTuteur'=>'required|alpha|min:2',
            'prenomTuteur'=>'required|alpha|min:3 ',
            'telephoneTuteur'=>'required|digits:9|starts_with:77,78,76,70,33,30|unique:tuteurs',
        ]);
        Tuteur::create([
            'nom'=>$request->nomTuteur,
            'prenom'=>$request->prenomTuteur,
            'nomUtilisateur'=>nomUserTuteur(),
            'telephoneTuteur'=>$request->telephoneTuteur,
            'motDePasse'=>$request->nomTuteur.date('Y'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tuteur $tuteur)
    {
            return view('parent.afficherTuteur',compact('tuteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tuteur $tuteur)
    {
        return view('parent.modifierTuteur',compact('tuteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuteur $tuteur)
    {
        $this->validate($request,[
            'nomTuteur'=>'required|alpha|min:2',
            'prenomTuteur'=>'required|alpha|min:3 ',
            'telephoneTuteur'=>[
                'required',
                'digits:9',
                'starts_with:77,78,76,70,33,30',
                Rule::unique('tuteurs')->ignore($tuteur),
            ],
        ]);

        Tuteur::where('nomUtilisateur',$tuteur->nomUtilisateur)
                ->update([
                    'nom'=>$request->nomTuteur,
                    'prenom'=>$request->prenomTuteur,
                    'telephoneTuteur'=>$request->telephoneTuteur,
        ]);
        Flash('Tuteur modifier avec succé '.$tuteur->nomUtilisateur);
        Flashy::success('Tuteur modifier avec succé '.$tuteur->nomUtilisateur);
        return redirect()->route('tuteur.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
