<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Professeur;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
use Flashy;
use Illuminate\Validation\Rule;
use MercurySeries\Flashy\Flashy as FlashyFlashy;

class ControllerProfesseur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professeur = Professeur::all();
        return view('professeurs.listeProf',compact('professeur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matieres = Matiere::all();
        return view('professeurs.ajoutProf',compact('matieres'));
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
            'nom'=>'required|string|min:2',
            'prenom'=>'required|string|min:3',
            'telephone'=>'required|digits:9|unique:professeurs|starts_with:77,78,76,70,33,30',
            'adresse'=>'required|string|min:3',
            'sexe'=>'required',
            'matiere'=>'required'
        ]);

       // dd($request->matiere);
           // dd($request->matiere);
           $nomUtilisateur= nomUser();
                $data = ['nomUtilisateur'=>$nomUtilisateur,
                'profil'=>'professeur',
                'password'=>'12345678'];
                (new RegisterController())->create($data);
        $prof=Professeur::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'adresse'=>$request->adresse,
            'telephone'=>$request->telephone,
            'sexe'=>$request->sexe,
            'nomUtilisateur'=>$nomUtilisateur
        ]);

       /* foreach($request->matiere as $matieres){
            $mat = Matiere::where('reference',$matieres)->first();
            $prof->matieres()->attach($mat->id);
    }*/

    $mat = Matiere::whereIn('reference',$request->matiere)->get();
    $prof->matieres()->attach($mat);
    flash('professeur ajouté avec succé');
    return redirect()->route('professeur.create');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Professeur $professeur)
    {
        return view('professeurs.afficherProf',compact('professeur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Professeur $professeur)
    {
        //$matieres = Matiere::all();
        return view('professeurs.modifierProf',compact('professeur'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professeur $professeur)
    {
        $this->validate($request,[
            'nom'=>'required|string|min:2',
            'prenom'=>'required|string|min:3',
            'telephone'=>[
                'required',
                'digits:9',
                'starts_with:77,78,76,70,33,30',
            Rule::unique('professeurs')->ignore($professeur)],
            'adresse'=>'required|string|min:3',
            ]);

            Professeur::where('nomUtilisateur',$professeur->nomUtilisateur)
                        ->update([
                            'nom'=>$request->nom,
                            'prenom'=>$request->prenom,
                            'adresse'=>$request->adresse,
                            'telephone'=>$request->telephone,
                        ]);

                    Flash('modification effectué avec succé pour le professeur '.$professeur->nomUtilisateur);
                    Flashy::success('modification effectué avec succé pour le professeur '.$professeur->nomUtilisateur);
                    return redirect()->route('professeur.index');
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
