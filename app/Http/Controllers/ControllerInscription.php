<?php

namespace App\Http\Controllers;

use App\Models\anneeScolaire;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Classe_eleve;
use Illuminate\Http\Request;
use Flashy;

class ControllerInscription extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('utilisateur.reinscription');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('utilisateur.reinscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if (!$classe = Classe::where('nomClasse', $request->classe)->first()) {
            flash('veulliez choisir une classe','danger');
            return back();
        }

        $this->validate($request, [
            'classe' => 'required',
            'nomUtilisateur' => 'required|numeric|digits:8',
            'sommeVerse' => 'required|integer|min:1|max:'.$classe->montantInscription,
        ]);
        if ($eleves = Eleve::where('nomUtilisateur', $request->nomUtilisateur)->firstOrFail()) {
             //= Eleve::where('nomUtilisateur', $request->nomUtilisateur)->firstOrFail();
            if ($eleves->classes()->where('anneeScolaire',anneeScolaire())->first()){
                flash("L'éléve avec le nom utilisateur " . $request->nomUtilisateur . " s'est dejà inscrit  pour l'année Scolaire " . anneeScolaire(),"danger");
            } else {
                $classe->eleves()->attach($eleves->id, [
                    'anneeScolaire' =>anneeScolaire(),
                    'montant' => $request->sommeVerse,
                    'reliquat' => ($classe->montantInscription - $request->sommeVerse),
                    'statu' => 1
                ]);
                flash("Eleve  inscrit avec succé avec succé");
            }
            return redirect()->route('inscription.index');
        } else {
            flash("L'éléve avec le nom utilisateur " . $request->nomUtilisateur . " n'existe pas", "danger");
            return redirect()->route('inscription.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
